<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderVendor;

class MitraOrderController extends Controller
{
    public function index(Request $request)
    {
        $mitra = $request->user()->mitra;
        $orders = OrderVendor::with('order', 'items.product')->where('mitra_id', $mitra->id)->get();
        return response()->json(['success' => true, 'message' => 'Mitra orders', 'data' => $orders]);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate(['status' => 'required|string']);
        $mitra = $request->user()->mitra;
        $ov = OrderVendor::where('mitra_id', $mitra->id)->where('id', $id)->firstOrFail();
        $ov->status = $request->status;
        $ov->save();

        // notify customer and mitra via FCM about status change
        try {
            $fcm = app(\App\Services\FcmService::class);
            $custTokens = \App\Models\DeviceToken::where('user_id', $ov->order->customer_id)->pluck('token')->toArray();
            if (!empty($custTokens)) {
                $fcm->sendToTokens($custTokens, 'Order status updated', 'Order #' . $ov->order->id . ' status: ' . $ov->status, ['order_id' => $ov->order->id, 'order_vendor_id' => $ov->id, 'status' => $ov->status]);
            }
            $mitraTokens = \App\Models\DeviceToken::where('user_id', $ov->mitra->user_id)->pluck('token')->toArray();
            if (!empty($mitraTokens)) {
                $fcm->sendToTokens($mitraTokens, 'Order status updated', 'Order #' . $ov->order->id . ' status: ' . $ov->status, ['order_id' => $ov->order->id, 'order_vendor_id' => $ov->id, 'status' => $ov->status]);
            }
        } catch (\Throwable $e) {
            // ignore
        }

        // dispatch WhatsApp job to notify both customer and mitra about the status change/order
        try {
            \App\Jobs\SendOrderWhatsappNotification::dispatch($ov->order_id)->afterCommit();
        } catch (\Throwable $e) {
            // ignore
        }

        return response()->json(['success' => true, 'message' => 'Status updated', 'data' => $ov]);
    }
}
