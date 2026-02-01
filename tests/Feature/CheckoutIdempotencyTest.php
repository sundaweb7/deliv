<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Mitra;
use App\Models\Product;
use App\Models\Wallet;
use App\Models\Setting;

class CheckoutIdempotencyTest extends TestCase
{
    use RefreshDatabase;

    public function test_checkout_is_idempotent_with_same_key()
    {
        Setting::create(['vendor_commission_percent' => 10, 'admin_delivery_cut' => 20]);

        $mitraUser = User::factory()->create(['role' => 'mitra']);
        $mitra = Mitra::create(['user_id' => $mitraUser->id, 'delivery_type' => 'self_delivery']);
        $product = Product::create(['mitra_id' => $mitra->id, 'name' => 'P', 'price' => 10000, 'stock' => 10]);

        $customer = User::factory()->create(['role' => 'customer']); Wallet::create(['user_id' => $customer->id, 'balance' => 100000]);

        $this->actingAs($customer, 'sanctum');
        $this->postJson('/api/customer/cart/add', ['product_id' => $product->id, 'qty' => 1])->assertStatus(200);

        $key = 'idem-' . uniqid();
        $res1 = $this->withHeaders(['Idempotency-Key' => $key])->postJson('/api/customer/checkout', ['lat'=>0,'lng'=>0,'address'=>'X','payment_method'=>'wallet']);
        $res1->assertStatus(200);
        $orderId1 = $res1->json('data.id');

        // try again same key
        $this->postJson('/api/customer/cart/add', ['product_id' => $product->id, 'qty' => 1])->assertStatus(200);
        $res2 = $this->withHeaders(['Idempotency-Key' => $key])->postJson('/api/customer/checkout', ['lat'=>0,'lng'=>0,'address'=>'X','payment_method'=>'wallet']);
        $res2->assertStatus(200);
        $orderId2 = $res2->json('data.id');

        $this->assertEquals($orderId1, $orderId2);
    }
}