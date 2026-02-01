<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voucher;

class VoucherController extends Controller
{
    public function check(Request $request)
    {
        $request->validate(['code' => 'required|string', 'amount' => 'required|numeric|min:0']);
        $v = Voucher::where('code', $request->code)->first();
        if (!$v) return response()->json(['success' => false, 'message' => 'Voucher not found'], 404);
        $valid = $v->isValidForAmount((float)$request->amount);
        if (!$valid) return response()->json(['success' => false, 'message' => 'Voucher not valid for this order'], 400);
        $discount = $v->calculateDiscount((float)$request->amount);
        return response()->json(['success' => true, 'message' => 'Voucher valid', 'data' => ['discount' => $discount, 'grand_total' => round($request->amount - $discount,2)]]);
    }
}
