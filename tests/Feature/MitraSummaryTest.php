<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Mitra;

class MitraSummaryTest extends TestCase
{
    use RefreshDatabase;

    public function test_mitra_summary_returns_counts()
    {
        $user = User::factory()->create(['role' => 'mitra']);
        $mitra = Mitra::create(['user_id' => $user->id, 'delivery_type' => 'anyerdeliv']);

        // create some products and transactions
        \App\Models\Product::create(['mitra_id' => $mitra->id, 'name' => 'P1', 'price' => 10000, 'stock' => 10]);
        \App\Models\Product::create(['mitra_id' => $mitra->id, 'name' => 'P2', 'price' => 10000, 'stock' => 10]);
        \App\Models\Product::create(['mitra_id' => $mitra->id, 'name' => 'P3', 'price' => 10000, 'stock' => 10]);

        // create delivered order vendor (create order & order_vendor)
        $customer = \App\Models\User::factory()->create(['role' => 'customer']);
        $order = \App\Models\Order::create(['customer_id' => $customer->id, 'order_type' => 'delivery', 'status' => 'pending', 'total_food' => 10000, 'delivery_fee' => 0, 'admin_profit' => 0, 'grand_total' => 10000, 'payment_method' => 'cod', 'payment_status' => 'pending']);
        \App\Models\OrderVendor::create(['mitra_id' => $mitra->id, 'status' => 'delivered', 'order_id' => $order->id, 'total' => 10000]);

        // create wallet and transaction
        \App\Models\Wallet::create(['user_id' => $user->id, 'balance' => 0]);
        $wallet = \App\Models\Wallet::where('user_id', $user->id)->first();
        \App\Models\Transaction::create(['wallet_id' => $wallet->id, 'type' => 'topup', 'amount' => 100]);

        $token = $user->createToken('test')->plainTextToken;

        $response = $this->withHeader('Authorization', 'Bearer '.$token)->getJson('/api/mitra/summary');
        $response->assertStatus(200);
        $json = $response->json('data');
        $this->assertEquals(3, $json['products_count']);
        $this->assertEquals(1, $json['sales_count']);
        $this->assertEquals(1, $json['transactions_count']);
    }
}
