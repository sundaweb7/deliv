<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderVendor;
use App\Models\OrderItem;
use App\Models\Driver;
use App\Models\DriverRoute;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;

class CheckoutService
{
    protected $user;
    protected $cart;

    public function __construct($user)
    {
        $this->user = $user;
        $this->cart = Cart::where('user_id', $user->id)->with('items.product.mitra')->first();
    }

    protected function computeDistanceKm($lat1, $lng1, $lat2, $lng2)
    {
        // Haversine formula
        $earthRadius = 6371; // km
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lng2 - $lng1);
        $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon/2) * sin($dLon/2);
        $c = 2 * atan2(sqrt($a), sqrt(1-$a));
        return $earthRadius * $c;
    }

    protected function feeByDistance($km)
    {
        // Mock rate: 3000 per km
        return max(5000, round($km * 3000));
    }

    public function checkout($lat, $lng, $address, $note = null, $paymentMethod = 'wallet', $bankId = null, $deliveryOption = null, $mitraShippingSelections = [])
    {
        if (!$this->cart || $this->cart->items->isEmpty()) {
            throw new \Exception('Cart kosong');
        }

        // Group items by mitra
        $grouped = [];
        foreach ($this->cart->items as $item) {
            $mitra = $item->product->mitra;
            if (!$mitra) {
                throw new \Exception('Mitra tidak ditemukan untuk product: ' . $item->product->id);
            }
            $grouped[$mitra->id][] = $item;
        }

        $settings = Setting::orderBy('id','desc')->first();

        // Validate delivery option rules
        if (count($grouped) > 1) {
            // multi-vendor must use admin courier
            if ($deliveryOption && $deliveryOption !== 'admin') {
                throw new \Exception('Multi-mitra harus menggunakan kurir admin (admin driver).');
            }
            // ensure all mitras support admin driver
            foreach ($grouped as $mitraId => $items) {
                $mitra = $items[0]->product->mitra;
                if ($mitra->delivery_type !== 'app_driver') {
                    throw new \Exception('Multi-mitra hanya diperbolehkan jika semua mitra menggunakan app_driver');
                }
            }
        } else {
            // single vendor
            $first = reset($grouped);
            $singleMitra = $first[0]->product->mitra;
            if ($deliveryOption === 'admin' && $singleMitra->delivery_type !== 'app_driver') {
                throw new \Exception('Mitra tidak mendukung kurir admin');
            }
            if ($deliveryOption === 'mitra' && $singleMitra->delivery_type === 'app_driver') {
                throw new \Exception('Mitra ini hanya mendukung kurir admin, tidak dapat menggunakan kurir mitra');
            }
            if ($deliveryOption === 'pickup' && count($grouped) > 1) {
                throw new \Exception('Pickup tidak tersedia untuk multi-mitra');
            }
        }

        return DB::transaction(function () use ($grouped, $settings, $lat, $lng, $address, $note, $paymentMethod, $bankId, $deliveryOption, $mitraShippingSelections) {
            $order = Order::create([
                'customer_id' => $this->user->id,
                'order_type' => 'delivery',
                'status' => 'pending',
                'payment_method' => $paymentMethod,
                'payment_status' => ($paymentMethod==='wallet') ? 'pending' : 'pending',
                'bank_id' => $bankId,
                'total_food' => 0,
                'delivery_fee' => 0,
                'admin_profit' => 0,
                'grand_total' => 0,
            ]);

            $totalFood = 0;
            $totalDelivery = 0;
            $totalAdminProfit = 0;

            foreach ($grouped as $mitraId => $items) {
                $subtotal = 0;
                foreach ($items as $it) {
                    $subtotal += $it->price * $it->qty;
                }

                $mitra = $items[0]->product->mitra;
                // compute distance mitra -> customer
                if (is_numeric($mitra->lat) && is_numeric($mitra->lng)) {
                    $dist = $this->computeDistanceKm($mitra->lat, $mitra->lng, $lat, $lng);
                } else {
                    $dist = 3; // mock 3km
                }

                // keep distances and subtotal for later multi-vendor handling
                $vendorDistances[$mitraId] = $dist;
                $vendorSubtotals[$mitraId] = $subtotal;

                $orderVendor = OrderVendor::create([
                    'order_id' => $order->id,
                    'mitra_id' => $mitraId,
                    'subtotal_food' => $subtotal,
                    'delivery_type' => $mitra->delivery_type,
                    'status' => 'pending',
                ]);

                foreach ($items as $it) {
                    OrderItem::create([
                        'order_vendor_id' => $orderVendor->id,
                        'product_id' => $it->product->id,
                        'qty' => $it->qty,
                        'price' => $it->price,
                    ]);
                }

                // assign driver if needed (mock nearest online driver)
                // Only assign driver when either admin courier is selected or when mitra supports app_driver and customer did not select pickup/mitra
                if ((($deliveryOption === null) && $mitra->delivery_type === 'app_driver') || ($deliveryOption === 'admin')) {
                    $driver = Driver::where('is_online', true)->first(); // mock: first online driver
                    if ($driver) {
                        DriverRoute::create([
                            'driver_id' => $driver->id,
                            'order_vendor_id' => $orderVendor->id,
                            'pickup_sequence' => 0,
                            'pickup_status' => 'pending',
                        ]);

                        // notify driver via FCM (if token exists)
                        try {
                            $fcm = new \App\Services\FcmService();
                            $tokens = \App\Models\DeviceToken::where('user_id', $driver->user_id)->pluck('token')->toArray();
                            if (!empty($tokens)) {
                                $fcm->sendToTokens($tokens, 'New delivery assigned', 'You have a new order to deliver (order_id: ' . $order->id . ')', ['order_id' => $order->id]);
                            }
                        } catch (\Throwable $e) {
                            // ignore notification failure for now
                        }

                        // notify mitra about new order
                        try {
                            $fcm = new \App\Services\FcmService();
                            $mitraTokens = \App\Models\DeviceToken::where('user_id', $mitra->user_id)->pluck('token')->toArray();
                            if (!empty($mitraTokens)) {
                                $fcm->sendToTokens($mitraTokens, 'New order received', 'You have a new order (order_id: ' . $order->id . ')', ['order_id' => $order->id]);
                            }
                        } catch (\Throwable $e) {
                            // ignore
                        }
                    }
                }

                $totalFood += $subtotal;
                $orderVendorsCreated[] = $orderVendor;

                // Temporarily update subtotal
                $orderVendor->update(['subtotal_food' => $subtotal]);
            }

            // After creating all order_vendors compute delivery fees
            if ($deliveryOption === 'pickup') {
                // pickup: no delivery fee, set all shares to 0
                foreach ($orderVendorsCreated as $ov) {
                    $ov->update(['delivery_fee_share' => 0]);
                }
                $totalDelivery = 0;
                $order->order_type = 'pickup';
            } elseif ($deliveryOption === 'mitra') {
                // mitra courier: only allowed for single vendor and mitra must have active courier
                $firstOv = $orderVendorsCreated[0];
                $mitra = \App\Models\Mitra::find($firstOv->mitra_id);
                if (!$mitra || !$mitra->hasActiveCourier()) {
                    throw new \Exception('Mitra tidak memiliki kurir aktif untuk opsi kurir mitra');
                }

                // If customer provided a shipping rate selection for this mitra, validate and use it
                $selectedRateId = null;
                if (is_array($mitraShippingSelections) && !empty($mitraShippingSelections)) {
                    // try direct key lookup
                    if (array_key_exists($mitra->id, $mitraShippingSelections)) {
                        $selectedRateId = $mitraShippingSelections[$mitra->id];
                    } else {
                        // try string key match or array structures
                        foreach ($mitraShippingSelections as $k => $v) {
                            if ((string)$k === (string)$mitra->id) { $selectedRateId = $v; break; }
                            if (is_array($v) && isset($v['mitra_id']) && isset($v['rate_id']) && (string)$v['mitra_id'] === (string)$mitra->id) { $selectedRateId = $v['rate_id']; break; }
                        }
                    }
                }

                $deliveryFee = null;
                if ($selectedRateId) {
                    $rate = \App\Models\MitraShippingRate::whereHas('shipping', function($q) use ($mitra){ $q->where('mitra_id', $mitra->id)->where('is_active', true); })->where('id', $selectedRateId)->where('is_active', true)->first();
                    if (!$rate) {
                        throw new \Exception('Pilihan ongkir mitra tidak valid');
                    }
                    $deliveryFee = (float) $rate->cost;
                    // store selection on order vendor
                    $firstOv->update(['shipping_model_id' => $rate->mitra_shipping_id, 'shipping_rate_id' => $rate->id]);
                } else {
                    // fallback to distance-based fee
                    $firstVendorId = array_key_first($vendorDistances);
                    $dist = $vendorDistances[$firstVendorId];
                    $deliveryFee = $this->feeByDistance($dist);
                }

                // assign full deliveryFee to that vendor (mitra keeps most after admin cut)
                $orderVendorsCreated[0]->update(['delivery_fee_share' => $deliveryFee]);
                $totalDelivery = $deliveryFee;

                // assign or queue courier route to a mitra courier
                // prefer direct couriers then attached ones
                $courier = $mitra->couriers()->where('is_active', true)->first();
                if (!$courier) {
                    $courier = $mitra->couriersMany()->where('is_active', true)->first();
                }
                if ($courier) {
                    $existing = \App\Models\CourierRoute::where('mitra_courier_id', $courier->id)->whereIn('pickup_status', ['queued','pending','accepted','on_delivery'])->count();
                    $seq = $existing + 1;
                    $status = ($existing >= 5) ? 'queued' : 'pending';
                    // compute courier fee for this vendor share
                    $courierFee = 0.0;
                    if (isset($deliveryFee) && $deliveryFee > 0) {
                        $courierFee = round(($settings->courier_share_percent / 100) * $deliveryFee, 2);
                    }
                    \App\Models\CourierRoute::create(['mitra_courier_id' => $courier->id, 'order_vendor_id' => $firstOv->id, 'pickup_sequence' => $seq, 'pickup_status' => $status, 'courier_fee' => $courierFee, 'courier_paid' => false]);
                }
                // do not auto assign platform driver
            } elseif (count($grouped) === 1) {
                // Single vendor: compute fee from that vendor (default behavior)
                $firstVendorId = array_key_first($vendorDistances);
                $dist = $vendorDistances[$firstVendorId];
                $deliveryFee = $this->feeByDistance($dist);
                // assign full deliveryFee to that vendor
                $orderVendorsCreated[0]->update(['delivery_fee_share' => $deliveryFee]);
                $totalDelivery = $deliveryFee;
            } else {
                // Multi-vendor: compute furthest distance and single delivery fee
                $maxDist = max($vendorDistances);
                $deliveryFee = $this->feeByDistance($maxDist);
                // distribute delivery fee proportionally by subtotal
                foreach ($orderVendorsCreated as $ov) {
                    $share = 0.0;
                    if ($totalFood > 0) {
                        $share = round(($ov->subtotal_food / $totalFood) * $deliveryFee, 2);
                    }
                    $ov->update(['delivery_fee_share' => $share]);
                }
                // adjust rounding differences to ensure sum equals deliveryFee
                $sumShares = array_sum(array_map(function($ov){return (float)$ov->delivery_fee_share;}, $orderVendorsCreated));
                if ($sumShares !== $deliveryFee) {
                    // add remainder to first vendor
                    $diff = $deliveryFee - $sumShares;
                    $ov = $orderVendorsCreated[0];
                    $ov->update(['delivery_fee_share' => round($ov->delivery_fee_share + $diff, 2)]);
                }
                $totalDelivery = $deliveryFee;
            }

            // compute commissions and admin profit (admin gets vendor commission + adminDeliveryCut from delivery)
            $totalAdminProfit = 0;
            foreach ($orderVendorsCreated as $ov) {
                $subtotal = $ov->subtotal_food;
                $vendorCommission = ($settings->vendor_commission_percent / 100) * $subtotal;
                $totalAdminProfit += $vendorCommission;
            }
            $adminDeliveryCutTotal = ($settings->admin_delivery_cut / 100) * $totalDelivery;
            $totalAdminProfit += $adminDeliveryCutTotal;



            $grand = $totalFood + $totalDelivery;
            $order->update([
                'total_food' => $totalFood,
                'delivery_fee' => $totalDelivery,
                'admin_profit' => $totalAdminProfit,
                'grand_total' => $grand,
            ]);

            // process payment if wallet selected
            if ($paymentMethod === 'wallet') {
                $walletSvc = new \App\Services\WalletService();
                $customerId = $this->user->id;
                // debit grand total from customer wallet
                $walletSvc->debit($customerId, $grand, 'Order payment for order ' . $order->id);
                $order->payment_status = 'paid';
                $order->save();

                // If order is pickup (no delivery), process payouts immediately
                if ($order->order_type === 'pickup') {
                    $adminUser = \App\Models\User::where('role', 'admin')->first();
                    foreach ($order->orderVendors as $ov) {
                        if ($ov->payout_processed) continue;
                        $subtotal = $ov->subtotal_food;
                        $vendorCommission = ($settings->vendor_commission_percent / 100) * $subtotal;
                        $adminDeliveryCut = ($settings->admin_delivery_cut / 100) * ($ov->delivery_fee_share ?? 0);

                        $mitraUserId = $ov->mitra->user_id;
                        // credit mitra: subtotal - vendor commission + vendor delivery share (minus courier/cut handled elsewhere)
                        $mitraAmount = round($subtotal - $vendorCommission + ($ov->delivery_fee_share ?? 0) - $adminDeliveryCut, 2);
                        if ($mitraAmount > 0) {
                            $walletSvc->credit($mitraUserId, $mitraAmount, 'Order payout');
                        }

                        // credit admin: vendor commission + admin delivery cut
                        if ($adminUser) {
                            $adminAmount = round($vendorCommission + $adminDeliveryCut, 2);
                            if ($adminAmount > 0) $walletSvc->credit($adminUser->id, $adminAmount, 'Admin commission', 'commission');
                        }

                        $ov->payout_processed = true;
                        $ov->save();
                    }
                }
            } else {
                // bank_transfer: remains pending until admin confirms payment
                $order->payment_status = 'pending';
                $order->save();
            }

            // clear cart
            $this->cart->items()->delete();

            return $order->load('orderVendors.items');
        });
    }
}
