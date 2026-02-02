<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Mitra;
use App\Models\Product;
use App\Models\Cart;

class CheckoutClosedMitraTest extends TestCase
{
    use RefreshDatabase;

    public function test_checkout_fails_if_any_mitra_closed()
    {
        $customer = User::factory()->create(['role' => 'customer']);
        $mitraUser = User::factory()->create(['role' => 'mitra']);
        $mitra = Mitra::create(['user_id' => $mitraUser->id, 'delivery_type' => 'self_delivery', 'is_active' => 1, 'is_open' => 0]);
        $product = Product::create(['mitra_id' => $mitra->id, 'name' => 'Closed Product', 'price' => 10000, 'stock' => 10, 'is_active' => 1]);

        $this->actingAs($customer, 'sanctum');

        // post items directly to checkout payload
        $payload = [
            'lat' => 0.0,
            'lng' => 0.0,
            'address' => 'Test Addr',
            'items' => [['product_id' => $product->id, 'qty' => 1]],
            'payment_method' => 'wallet',
        ];

        $res = $this->postJson('/api/customer/checkout', $payload);
        $res->assertStatus(422);
        $res->assertJson(['success' => false]);
        $this->assertStringContainsStringIgnoringCase('tutup', $res->json('message'));
    }
}
