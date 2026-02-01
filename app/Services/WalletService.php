<?php

namespace App\Services;

use App\Models\Wallet;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class WalletService
{
    public function credit(int $userId, float $amount, string $description = null, string $type = 'credit')
    {
        return DB::transaction(function () use ($userId, $amount, $description, $type) {
            $wallet = Wallet::firstOrCreate(['user_id' => $userId], ['balance' => 0]);
            $wallet->balance += $amount;
            $wallet->save();

            $tx = Transaction::create([
                'wallet_id' => $wallet->id,
                'type' => $type,
                'amount' => $amount,
                'description' => $description,
            ]);

            return $tx;
        });
    }

    public function debit(int $userId, float $amount, string $description = null, string $type = 'debit', bool $allowNegative = false)
    {
        return DB::transaction(function () use ($userId, $amount, $description, $type, $allowNegative) {
            $wallet = Wallet::firstOrCreate(['user_id' => $userId], ['balance' => 0]);
            if (!$allowNegative && $wallet->balance < $amount) {
                throw new \Exception('Insufficient balance');
            }
            $wallet->balance -= $amount;
            $wallet->save();

            $tx = Transaction::create([
                'wallet_id' => $wallet->id,
                'type' => $type,
                'amount' => $amount,
                'description' => $description,
            ]);

            return $tx;
        });
    }
}
