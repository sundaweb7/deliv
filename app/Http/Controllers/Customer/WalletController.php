<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wallet;
use App\Models\Transaction;
use App\Services\WalletService;

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

    public function topup(Request $request)
    {
        $request->validate(['amount' => 'required|numeric|min:1']);
        // For MVP we mock topup as immediate credit (in prod you'd integrate gateway)
        $svc = new WalletService();
        $tx = $svc->credit($request->user()->id, (float)$request->amount, 'Topup');
        return response()->json(['success' => true, 'message' => 'Topup success', 'data' => $tx]);
    }
}