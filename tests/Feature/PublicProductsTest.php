<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Mitra;
use App\Models\Product;

class PublicProductsTest extends TestCase
{
    use RefreshDatabase;

    public function test_products_can_be_viewed_without_auth()
    {
        $mitraUser = User::factory()->create(['role' => 'mitra']);
        $mitra = Mitra::create(['user_id' => $mitraUser->id, 'delivery_type' => 'self_delivery']);
        Product::create(['mitra_id' => $mitra->id, 'name' => 'Public Product', 'price' => 10000, 'stock' => 10]);

        $res = $this->getJson('/api/products');
        $res->assertStatus(200);
        $res->assertJsonFragment(['name' => 'Public Product']);
    }
}