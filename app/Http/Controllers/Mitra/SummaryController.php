<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SummaryController extends Controller
{
    public function summary(Request $request)
    {
        $user = $request->user();
        if (!$user || !$user->mitra) {
            return response()->json(['success' => false, 'message' => 'Unauthorized or not a mitra'], 401);
        }

        $mitra = $user->mitra;
        $productsCount = $mitra->products()->count();
        $salesCount = \App\Models\OrderVendor::where('mitra_id', $mitra->id)->where('status', 'delivered')->count();
        $transactionsCount = \App\Models\Transaction::whereHas('wallet', function($q) use ($user) { $q->where('user_id', $user->id); })->count();

        return response()->json(['success' => true, 'data' => [
            'products_count' => $productsCount,
            'sales_count' => $salesCount,
            'transactions_count' => $transactionsCount,
            'updated_at' => now()->toIso8601String(),
        ]]);
    }
}
