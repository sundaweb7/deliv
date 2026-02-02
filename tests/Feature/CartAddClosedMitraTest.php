<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Mitra;
use App\Models\Product;

class CartAddClosedMitraTest extends TestCase
{
    use RefreshDatabase;

    public function test_cannot_add_product_to_cart_when_mitra_closed()
    {
        $customer = User::factory()->create(['role' => 'customer']);
        $mitraUser = User::factory()->create(['role' => 'mitra']);
        $mitra = Mitra::create(['user_id' => $mitraUser->id, 'delivery_type' => 'self_delivery', 'is_active' => 1, 'is_open' => 0]);
        $product = Product::create(['mitra_id' => $mitra->id, 'name' => 'Closed Product', 'price' => 10000, 'stock' => 10, 'is_active' => 1]);

        $this->actingAs($customer, 'sanctum');
        $res = $this->postJson('/api/customer/cart/add', ['product_id' => $product->id, 'qty' => 1]);
        $res->assertStatus(422);
        $res->assertJson(['success' => false]);
        $this->assertStringContainsStringIgnoringCase('tutup', $res->json('message'));
    }
}
