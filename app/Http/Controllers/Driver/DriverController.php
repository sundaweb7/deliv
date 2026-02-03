<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\DriverRoute;
use App\Services\WalletService;
use App\Models\OrderVendor;
use App\Models\Setting;

class DriverController extends Controller
{
    public function setOnline(Request $request)
    {
        $request->validate(['is_online' => 'required|boolean', 'lat' => 'nullable|numeric', 'lng' => 'nullable|numeric']);
        $driver = $request->user()->driver;
        $driver->is_online = $request->is_online;
        if ($request->has('lat')) $driver->lat = $request->lat;
        if ($request->has('lng')) $driver->lng = $request->lng;
        $driver->save();
        return response()->json(['success' => true, 'message' => 'Driver status updated', 'data' => $driver]);
    }

    public function orders(Request $request)
    {
        $driver = $request->user()->driver;
        $routes = $driver->routes()->with('orderVendor.order', 'orderVendor.mitra')->where('pickup_status', 'pending')->get();
        return response()->json(['success' => true, 'message' => 'Available routes', 'data' => $routes]);
    }

    public function accept(Request $request, $id)
    {
        $driver = $request->user()->driver;
        $route = DriverRoute::where('driver_id', $driver->id)->where('order_vendor_id', $id)->firstOrFail();
        $route->pickup_status = 'accepted';
        $route->save();

        $ov = OrderVendor::find($id);
        $ov->status = 'on_delivery';
        $ov->save();

        // notify customer that driver accepted (if token exists)
        try {
            $fcm = app(\App\Services\FcmService::class);
            $customerId = $ov->order->customer_id;
            $tokens = \App\Models\DeviceToken::where('user_id', $customerId)->pluck('token')->toArray();
            if (!empty($tokens)) {
                $fcm->sendToTokens($tokens, 'Order on delivery', 'Your order is on delivery', ['order_id' => $ov->order->id]);
            }

            // also notify mitra that driver accepted
            $mitraTokens = \App\Models\DeviceToken::where('user_id', $ov->mitra->user_id)->pluck('token')->toArray();
            if (!empty($mitraTokens)) {
                $fcm->sendToTokens($mitraTokens, 'Driver assigned', 'Driver accepted delivery for order #' . $ov->order->id, ['order_id' => $ov->order->id]);
            }
        } catch (\Throwable $e) {
            // ignore
        }

        // dispatch WhatsApp notification job about driver status change/order progress
        try {
            \App\Jobs\SendOrderWhatsappNotification::dispatch($ov->order_id)->afterCommit();
        } catch (\Throwable $e) {
            // ignore
        }

        return response()->json(['success' => true, 'message' => 'Order accepted', 'data' => $route]);
    }

    public function complete(Request $request, $id)
    {
        $driver = $request->user()->driver;
        $route = DriverRoute::where('driver_id', $driver->id)->where('order_vendor_id', $id)->firstOrFail();
        $route->pickup_status = 'delivered';
        $route->save();

        $ov = OrderVendor::find($id);
        $ov->status = 'delivered';
        $ov->save();

        $order = $ov->order;

        // notify mitra and customer that vendor delivered
        try {
            $fcm = app(\App\Services\FcmService::class);
            $mitraTokens = \App\Models\DeviceToken::where('user_id', $ov->mitra->user_id)->pluck('token')->toArray();
            if (!empty($mitraTokens)) $fcm->sendToTokens($mitraTokens, 'Order delivered', 'Order vendor #' . $ov->id . ' delivered', ['order_id' => $ov->order->id]);

            $custTokens = \App\Models\DeviceToken::where('user_id', $ov->order->customer_id)->pluck('token')->toArray();
            if (!empty($custTokens)) $fcm->sendToTokens($custTokens, 'Order delivered', 'Your order #' . $ov->order->id . ' has been delivered', ['order_id' => $ov->order->id]);
        } catch (\Throwable $e) {}

        // dispatch WhatsApp notification job about delivery/completion
        try {
            \App\Jobs\SendOrderWhatsappNotification::dispatch($ov->order_id)->afterCommit();
        } catch (\Throwable $e) {
            // ignore
        }


        // If payment method is bank_transfer and not paid yet, do NOT process payouts here
        if ($order->payment_method === 'bank_transfer' && $order->payment_status !== 'paid') {
            return response()->json(['success' => true, 'message' => 'Order vendor marked delivered. Awaiting payment confirmation (bank transfer).']);
        }

        // If payout already processed for this vendor, skip
        if ($ov->payout_processed) {
            // notify mitra & customer that delivery completed
            try {
                $fcm = new \App\Services\FcmService();
                $mitraTokens = \App\Models\DeviceToken::where('user_id', $ov->mitra->user_id)->pluck('token')->toArray();
                if (!empty($mitraTokens)) $fcm->sendToTokens($mitraTokens, 'Order delivered', 'Order vendor #' . $ov->id . ' delivered', ['order_id' => $ov->order->id]);

                $custTokens = \App\Models\DeviceToken::where('user_id', $ov->order->customer_id)->pluck('token')->toArray();
                if (!empty($custTokens)) $fcm->sendToTokens($custTokens, 'Order delivered', 'Your order #' . $ov->order->id . ' has been delivered', ['order_id' => $ov->order->id]);
            } catch (\Throwable $e) {}

            return response()->json(['success' => true, 'message' => 'Order delivered. Payout already processed']);
        }

        // Process payouts now (wallet paid, COD, or bank transfer already confirmed)
        $setting = Setting::orderBy('id','desc')->first();
        $walletSvc = new WalletService();

        $subtotal = $ov->subtotal_food;
        $deliveryFee = (float) $ov->delivery_fee_share;

        // commission & admin delivery cut
        $vendorCommission = round(($setting->vendor_commission_percent / 100) * $subtotal, 2);
        $adminDeliveryCut = round(($setting->admin_delivery_cut / 100) * $deliveryFee, 2);

        // Mitra gets subtotal - vendorCommission + their share of delivery fee after admin cut minus courier share (if any)
        $mitraUserId = $ov->mitra->user_id;
        $courierShare = 0.0;
        // if this order_vendor has a DriverRoute (admin driver) with driver assigned, pay driver share
        $driverRoute = \App\Models\DriverRoute::where('order_vendor_id', $ov->id)->whereIn('pickup_status', ['accepted','on_delivery','delivered'])->first();
        if ($driverRoute && $driverRoute->driver_id) {
            $courierShare = round(($setting->courier_share_percent / 100) * $deliveryFee, 2);
            // credit driver
            $driver = \App\Models\Driver::find($driverRoute->driver_id);
            if ($driver && $driver->user_id && $courierShare > 0) {
                $walletSvc->credit($driver->user_id, $courierShare, 'Driver delivery fee');
            }
        }

        // If payment is cash (cod) we proceed but apply risk handling: if mitra balance < admin cut then auto-close store (do not reject transaction)
        if ($order->payment_method === 'cod') {
            $mitraAmount = round($subtotal + ($deliveryFee - $courierShare), 2);
            $totalAdminCut = round($vendorCommission + $adminDeliveryCut, 2);

            // Check mitra balance; if insufficient, close store and log (but still process payouts)
            $mitraWallet = \App\Models\Wallet::firstOrCreate(['user_id' => $mitraUserId], ['balance' => 0]);
            if ($mitraWallet->balance < $totalAdminCut) {
                // close mitra store
                $old = (int) $ov->mitra->is_open;
                $ov->mitra->is_open = false;
                $ov->mitra->save();

                \App\Models\MitraStatusLog::create(['mitra_id' => $ov->mitra->id, 'user_id' => $ov->mitra->user_id, 'old_is_open' => $old, 'new_is_open' => 0, 'reason' => 'Insufficient balance for commission (auto-closed)']);
            }

            // Credit admin commission (admin collects from cash)
            $admin = \App\Models\User::where('role', 'admin')->first();
            if ($admin && $admin->id && $totalAdminCut > 0) {
                $walletSvc->credit($admin->id, $totalAdminCut, 'Admin commission (collected cash)', 'commission');
            }

            // Credit mitra full payout (before admin cut)
            if ($mitraAmount > 0) {
                $walletSvc->credit($mitraUserId, $mitraAmount, 'Order payout');
            }
        } else {
            $mitraAmount = round(($subtotal - $vendorCommission) + ($deliveryFee - $adminDeliveryCut - $courierShare), 2);
            if ($mitraAmount > 0) {
                $walletSvc->credit($mitraUserId, $mitraAmount, 'Order payout');
            }

            // Admin gets vendorCommission + adminDeliveryCut
            $adminAmount = round($vendorCommission + $adminDeliveryCut, 2);
            $admin = \App\Models\User::where('role', 'admin')->first();
            if ($admin && $admin->id && $adminAmount > 0) {
                $walletSvc->credit($admin->id, $adminAmount, 'Admin commission', 'commission');
            }
        }

        $ov->payout_processed = true;
        $ov->save();

        // If all vendors delivered, and payment method is COD, mark order paid now
        if ($order->orderVendors()->where('status', '!=', 'delivered')->count() === 0) {
            if ($order->payment_method === 'cod') {
                $order->payment_status = 'paid';
                $order->save();
            }
        }

        return response()->json(['success' => true, 'message' => 'Order completed and payouts processed']);
    }
}
