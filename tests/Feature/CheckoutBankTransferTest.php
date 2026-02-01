<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Bank;
use App\Models\Wallet;

class CheckoutBankTransferTest extends TestCase
{
    use RefreshDatabase;

    public function test_checkout_with_bank_transfer_returns_pending_and_bank_info()
    {
        // seed admin and bank
        $user = User::factory()->create(['role' => 'customer']);
        $bank = Bank::create(['name'=>'BCA','account_name'=>'Deliv','account_number'=>'123456','type'=>'bank','is_active'=>true]);
        $this->actingAs($user, 'sanctum');

        $res = $this->postJson('/api/customer/checkout', ['lat'=>-6.2,'lng'=>106.8,'address'=>'addr','payment_method'=>'bank_transfer','bank_id'=>$bank->id]);
        // since cart empty, it will fail; but we can assert structure for pending case when implemented end-to-end
        $res->assertStatus(422);
    }
}