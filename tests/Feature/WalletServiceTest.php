<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Wallet;
use App\Services\WalletService;

class WalletServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_debit_works_on_existing_wallet()
    {
        $user = User::factory()->create();
        Wallet::create(['user_id' => $user->id, 'balance' => 100000]);
        $svc = new WalletService();
        $tx = $svc->debit($user->id, 50000, 'Test debit');
        $this->assertDatabaseHas('wallets', ['user_id' => $user->id, 'balance' => 50000]);
        $this->assertDatabaseHas('transactions', ['wallet_id' => $tx->wallet_id, 'amount' => 50000, 'type' => 'debit']);
    }
}