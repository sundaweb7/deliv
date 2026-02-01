<?php

namespace App\Http\Controllers\MitraUI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wallet;
use App\Models\MitraTopup;

class WalletController extends Controller
{
    public function show(Request $request)
    {
        $user = $request->user();
        if (!$user || !$user->mitra) return redirect()->route('login');

        $wallet = Wallet::firstOrCreate(['user_id' => $user->id], ['balance' => 0]);
        $transactions = $wallet->transactions()->orderBy('created_at', 'desc')->paginate(20);
        $topups = MitraTopup::where('user_id', $user->id)->orderBy('created_at','desc')->paginate(10);

        return view('mitra.wallet', ['wallet' => $wallet, 'transactions' => $transactions, 'topups' => $topups]);
    }

    public function requestTopup(Request $request)
    {
        $request->validate(['amount' => 'required|numeric|min:1', 'proof' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:5120']);
        $user = $request->user();
        if (!$user || !$user->mitra) return redirect()->route('login');

        $data = [
            'mitra_id' => $user->mitra->id,
            'user_id' => $user->id,
            'amount' => (float)$request->amount,
            'status' => 'pending',
        ];

        if ($request->hasFile('proof')) {
            $file = $request->file('proof');
            $filename = time() . '_' . preg_replace('/[^a-z0-9\.\-]+/i','_', $file->getClientOriginalName());
            $path = $file->storeAs('mitra-topups', $filename, 'public');
            $data['proof'] = $filename;
        }

        MitraTopup::create($data);
        return redirect()->route('mitra.wallet')->with('success', 'Topup request submitted (pending admin approval)');
    }
}