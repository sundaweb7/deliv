<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MitraWithdrawal;
use App\Models\Wallet;
use App\Services\WalletService;

class WithdrawalController extends Controller
{
    public function index(Request $request)
    {
        $mitra = $request->user()->mitra;
        if (!$mitra) return response()->json(['success'=>false,'message'=>'No mitra attached'],403);
        $items = MitraWithdrawal::where('mitra_id', $mitra->id)->orderBy('created_at','desc')->get();
        return response()->json(['success'=>true,'message'=>'Withdrawals','data'=>$items]);
    }

    public function store(Request $request)
    {
        $request->validate(['amount' => 'required|numeric|min:1','note' => 'nullable|string']);
        $mitra = $request->user()->mitra;
        if (!$mitra) return response()->json(['success'=>false,'message'=>'No mitra attached'],403);

        // ensure mitra has bank account details configured
        if (!$mitra->bank_account_name || !$mitra->bank_account_number) {
            return response()->json(['success'=>false,'message'=>'Bank account information incomplete. Please set bank account in profile before requesting withdrawal.'], 422);
        }

        // check balance
        $wallet = Wallet::firstOrCreate(['user_id' => $request->user()->id], ['balance' => 0]);
        if ($wallet->balance < (float)$request->amount) {
            return response()->json(['success'=>false,'message'=>'Insufficient balance'], 422);
        }
        $wd = MitraWithdrawal::create([
            'mitra_id' => $mitra->id,
            'user_id' => $request->user()->id,
            'amount' => (float) $request->amount,
            'note' => $request->note ?? null,
            'status' => 'pending',
        ]);

        return response()->json(['success'=>true,'message'=>'Withdrawal request submitted','data'=>$wd]);
    }
}