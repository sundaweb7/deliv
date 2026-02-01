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
        return response()->json(['success' => true, 'message' => 'Status updated', 'data' => $ov]);
    }
}
