<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Mitra;
use App\Models\MitraWithdrawal;
use App\Services\WalletService;

class AdminMitraWithdrawalsUITest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_view_withdrawals_and_perform_actions()
    {
        $admin = User::factory()->create(['role' => 'admin', 'email' => 'admin@x.test']);
        $token = $admin->createToken('admin-ui')->plainTextToken;
        $this->withSession(['admin_token' => $token, 'admin_user_id' => $admin->id]);

        $muser = User::factory()->create(['role' => 'mitra']);
        $mitra = Mitra::create(['user_id' => $muser->id, 'bank_account_name' => 'A', 'bank_account_number' => '123']);

        // seed wallet
        $walletSvc = new WalletService();
        $walletSvc->credit($muser->id, 200000, 'initial topup');

        $wd = MitraWithdrawal::create(['mitra_id' => $mitra->id, 'user_id' => $muser->id, 'amount' => 100000, 'status' => 'pending']);

        $res = $this->get('/admin/mitra-withdrawals');
        $res->assertStatus(200);
        $res->assertSee('Mitra Withdrawals');
        $res->assertSee('Rp ' . number_format($wd->amount,0,',','.'));

        $res = $this->get('/admin/mitra-withdrawals/' . $wd->id);
        $res->assertStatus(200);
        $res->assertSee('Withdrawal #' . $wd->id);

        // Approve -> processing
        $res = $this->post('/admin/mitra-withdrawals/' . $wd->id . '/approve');
        $res->assertRedirect();
        $this->assertDatabaseHas('mitra_withdrawals', ['id' => $wd->id, 'status' => 'processing']);

        // Complete -> success & debited
        $res = $this->post('/admin/mitra-withdrawals/' . $wd->id . '/complete');
        $res->assertRedirect();
        $this->assertDatabaseHas('mitra_withdrawals', ['id' => $wd->id, 'status' => 'success', 'is_debited' => 1]);

        // Now create another and reject (simulate debited then refund)
        $wd2 = MitraWithdrawal::create(['mitra_id' => $mitra->id, 'user_id' => $muser->id, 'amount' => 50000, 'status' => 'pending']);
        // manually debit to simulate already debited
        $walletSvc->debit($muser->id, 50000, 'sim debit');
        $wd2->is_debited = true;
        $wd2->save();

        $res = $this->post('/admin/mitra-withdrawals/' . $wd2->id . '/reject');
        $res->assertRedirect();
        $this->assertDatabaseHas('mitra_withdrawals', ['id' => $wd2->id, 'status' => 'failed', 'is_debited' => 0]);
    }
}
