<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Http\Controllers\Admin\MitraWithdrawalController;
use App\Models\User;
use App\Models\Mitra;
use App\Models\Wallet;
use App\Models\MitraWithdrawal;

class DebugCompleteWithdrawalTest extends TestCase
{
    use RefreshDatabase;

    public function test_debug_complete()
    {
        $admin = User::factory()->create(['role'=>'admin']);
        $muser = User::factory()->create(['role'=>'mitra']);
        $mitra = Mitra::create(['user_id' => $muser->id, 'bank_account_name' => 'A', 'bank_account_number' => '123']);
        Wallet::create(['user_id' => $muser->id, 'balance' => 100000]);

        $wd = MitraWithdrawal::create(['mitra_id' => $mitra->id, 'user_id' => $muser->id, 'amount' => 50000, 'status' => 'processing']);

        $controller = new MitraWithdrawalController();
        $req = new \Illuminate\Http\Request();
        $req->setUserResolver(function(){ return \App\Models\User::where('role','admin')->first(); });

        $res = $controller->complete($req, $wd->id);
        $this->assertIsArray($res->getData(true));
    }
}
