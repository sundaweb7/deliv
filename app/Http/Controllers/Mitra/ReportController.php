<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderVendor;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function finance(Request $request)
    {
        $request->validate(['from'=>'nullable|date','to'=>'nullable|date']);
        $mitra = $request->user()->mitra;
        if (!$mitra) return response()->json(['success'=>false,'message'=>'No mitra attached'],403);

        $from = $request->from; $to = $request->to;

        $ovQuery = OrderVendor::where('mitra_id', $mitra->id);
        if ($from) $ovQuery->whereDate('created_at','>=',$from);
        if ($to) $ovQuery->whereDate('created_at','<=',$to);

        $totalOrders = $ovQuery->count();
        $totalSales = (float) $ovQuery->sum('subtotal_food');

        // payouts to mitra from transactions where wallet belongs to mitra user and description contains 'Order payout'
        $walletTx = Transaction::whereHas('wallet', function ($q) use ($mitra) { $q->where('user_id', $mitra->user_id); });
        if ($from) $walletTx->whereDate('created_at','>=',$from);
        if ($to) $walletTx->whereDate('created_at','<=',$to);
        $payouts = (float) $walletTx->where('type','credit')->where('description','like','%Order payout%')->sum('amount');

        // topups and deductions
        $topups = (float) $walletTx->where('type','topup')->sum('amount');
        $commissions = (float) \App\Models\Transaction::where('type','commission')->whereHas('wallet', function($q) use ($mitra){ $q->where('user_id', $mitra->user_id); })->sum('amount');

        return response()->json(['success'=>true,'message'=>'Mitra finance','data'=>['orders'=>$totalOrders,'total_sales'=>$totalSales,'payouts'=>$payouts,'topups'=>$topups,'commissions'=>$commissions]]);
    }
}