<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wallet;
use App\Models\Transaction;
use App\Services\WalletService;
use App\Models\MitraTopup;

class WalletController extends Controller
{
    public function balance(Request $request)
    {
        $wallet = Wallet::firstOrCreate(['user_id' => $request->user()->id], ['balance' => 0]);
        return response()->json(['success' => true, 'message' => 'Wallet', 'data' => ['balance' => (float)$wallet->balance]]);
    }

    public function transactions(Request $request)
    {
        $wallet = Wallet::firstOrCreate(['user_id' => $request->user()->id], ['balance' => 0]);
        $tx = Transaction::where('wallet_id', $wallet->id)->orderBy('created_at','desc')->paginate(20);
        return response()->json(['success' => true, 'message' => 'Transactions', 'data' => $tx]);
    }

    // create a manual topup request (admin to approve)
    public function requestTopup(Request $request)
    {
        $request->validate(['amount' => 'required|numeric|min:1','proof' => 'nullable|string']);
        $mitra = $request->user()->mitra;
        if (!$mitra) return response()->json(['success'=>false,'message'=>'No mitra attached'],403);

        $topup = MitraTopup::create([
            'mitra_id' => $mitra->id,
            'user_id' => $request->user()->id,
            'amount' => (float) $request->amount,
            'proof' => $request->proof ?? null,
            'status' => 'pending',
        ]);

        return response()->json(['success' => true, 'message' => 'Topup request submitted', 'data' => $topup]);
    }
}