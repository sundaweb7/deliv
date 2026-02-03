<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Mitra;
use App\Models\Wallet;
use App\Models\MitraWithdrawal;
use App\Models\Setting;
use App\Models\Product;

class MitraWithdrawalTest extends TestCase
{
    use RefreshDatabase;

    public function test_mitra_can_request_withdrawal_and_view_history()
    {
        $user = User::factory()->create(['role'=>'mitra']);
        $this->actingAs($user, 'sanctum');
        $mitra = Mitra::create(['user_id' => $user->id, 'bank_account_name' => 'A', 'bank_account_number' => '123', 'bank_id' => null]);
        Wallet::create(['user_id' => $user->id, 'balance' => 100000]);

        $res = $this->postJson('/api/mitra/wallet/withdrawals', ['amount' => 50000]);
        $res->assertStatus(200)->assertJson(['success' => true]);
        $this->assertDatabaseHas('mitra_withdrawals', ['user_id' => $user->id, 'amount' => 50000, 'status' => 'pending']);

        $res2 = $this->getJson('/api/mitra/wallet/withdrawals');
        $res2->assertStatus(200)->assertJson(['success' => true]);
        $this->assertNotEmpty($res2->json('data'));
    }

    public function test_admin_can_approve_and_debit_wallet()
    {
        $admin = User::factory()->create(['role'=>'admin']);
        $muser = User::factory()->create(['role'=>'mitra']);
        $mitra = Mitra::create(['user_id' => $muser->id, 'bank_account_name' => 'A', 'bank_account_number' => '123']);
        Wallet::create(['user_id' => $muser->id, 'balance' => 100000]);

        $wd = MitraWithdrawal::create(['mitra_id' => $mitra->id, 'user_id' => $muser->id, 'amount' => 50000, 'status' => 'pending']);

        $this->actingAs($admin, 'sanctum');
        $res = $this->postJson('/api/admin/mitra-withdrawals/' . $wd->id . '/approve');
        $res->assertStatus(200)->assertJson(['success' => true]);

        $this->assertDatabaseHas('mitra_withdrawals', ['id' => $wd->id, 'status' => 'processing']);

        // now complete processing (transfer made manually) -> debit wallet
        $res2 = $this->postJson('/api/admin/mitra-withdrawals/' . $wd->id . '/complete');
        $res2->assertStatus(200)->assertJson(['success' => true]);

        $this->assertDatabaseHas('mitra_withdrawals', ['id' => $wd->id, 'status' => 'success', 'is_debited' => 1]);
        $this->assertDatabaseHas('wallets', ['user_id' => $muser->id, 'balance' => 50000]);
    }

    public function test_admin_rejects_without_affecting_balance()
    {
        $admin = User::factory()->create(['role'=>'admin']);
        $muser = User::factory()->create(['role'=>'mitra']);
        $mitra = Mitra::create(['user_id' => $muser->id]);
        Wallet::create(['user_id' => $muser->id, 'balance' => 100000]);

        $wd = MitraWithdrawal::create(['mitra_id' => $mitra->id, 'user_id' => $muser->id, 'amount' => 70000, 'status' => 'pending']);

        $this->actingAs($admin, 'sanctum');
        $res = $this->postJson('/api/admin/mitra-withdrawals/' . $wd->id . '/reject');
        $res->assertStatus(200)->assertJson(['success' => true]);

        $this->assertDatabaseHas('mitra_withdrawals', ['id' => $wd->id, 'status' => 'failed']);
        $this->assertDatabaseHas('wallets', ['user_id' => $muser->id, 'balance' => 100000]);
    }
}
