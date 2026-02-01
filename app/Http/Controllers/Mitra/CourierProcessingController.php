<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourierRoute;
use App\Models\MitraCourier;

class CourierProcessingController extends Controller
{
    // mark a queued/pending route as accepted by courier
    public function accept(Request $request, $id)
    {
        $user = $request->user();
        $mitra = $user->mitra;
        $route = CourierRoute::where('id', $id)->whereHas('courier', function($q) use ($mitra){ $q->where('mitra_id', $mitra->id); })->firstOrFail();
        $route->pickup_status = 'accepted';
        $route->save();
        return response()->json(['success'=>true,'message'=>'Route accepted','data'=>$route]);
    }

    public function complete(Request $request, $id)
    {
        $user = $request->user();
        $mitra = $user->mitra;
        $route = CourierRoute::where('id', $id)->whereHas('courier', function($q) use ($mitra){ $q->where('mitra_id', $mitra->id); })->firstOrFail();
        $route->pickup_status = 'delivered';
        $route->save();

        // also mark order vendor delivered
        $ov = $route->orderVendor;
        $ov->status = 'delivered';
        $ov->save();

        // process payouts now (similar to admin driver payout logic)
        $setting = \App\Models\Setting::orderBy('id','desc')->first();
        $walletSvc = new \App\Services\WalletService();

        $subtotal = $ov->subtotal_food;
        $deliveryFee = (float) $route->courier_fee ?? 0.0; // courier fee portion related to this route
        $vendorShareDelivery = (float) $ov->delivery_fee_share;

        // commission & admin delivery cut
        $vendorCommission = round(($setting->vendor_commission_percent / 100) * $subtotal, 2);
        $adminDeliveryCut = round(($setting->admin_delivery_cut / 100) * $vendorShareDelivery, 2);

        // courier fee is already reserved on route.courier_fee
        $courierFee = round($route->courier_fee, 2);

        $mitraUserId = $ov->mitra->user_id;

        // If payment is cash (cod) we do not reject but will auto-close mitra store if their wallet balance < admin cut
        if ($route->orderVendor && $route->orderVendor->order && $route->orderVendor->order->payment_method === 'cod') {
            $mitraAmount = round($subtotal + ($vendorShareDelivery - $courierFee), 2);
            $totalAdminCut = round($vendorCommission + $adminDeliveryCut, 2);

            // Check mitra balance; auto-close if insufficient
            $mitraWallet = \App\Models\Wallet::firstOrCreate(['user_id' => $mitraUserId], ['balance' => 0]);
            if ($mitraWallet->balance < $totalAdminCut) {
                $old = (int) $ov->mitra->is_open;
                $ov->mitra->is_open = false;
                $ov->mitra->save();

                \App\Models\MitraStatusLog::create(['mitra_id' => $ov->mitra->id, 'user_id' => $ov->mitra->user_id, 'old_is_open' => $old, 'new_is_open' => 0, 'reason' => 'Insufficient balance for commission (auto-closed)']);
            }

            // credit admin commission (collected as cash)
            $admin = \App\Models\User::where('role', 'admin')->first();
            if ($admin && $admin->id && $totalAdminCut > 0) {
                $walletSvc->credit($admin->id, $totalAdminCut, 'Admin commission (collected cash)', 'commission');
            }

            if ($mitraAmount > 0) {
                $walletSvc->credit($mitraUserId, $mitraAmount, 'Order payout');
            }
        } else {
            // Mitra gets subtotal - vendorCommission + delivery share after admin cut minus courierFee
            $mitraAmount = round(($subtotal - $vendorCommission) + ($vendorShareDelivery - $adminDeliveryCut - $courierFee), 2);
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

        // mark payout processed
        $ov->payout_processed = true;
        $ov->save();

        return response()->json(['success'=>true,'message'=>'Route completed and payouts processed','data'=>$route]);
    }
}