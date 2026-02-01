<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Product;

class FeaturedProductsTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_add_featured_product_and_position_validation()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $this->actingAs($admin, 'sanctum');

        $mitraUser = \App\Models\User::factory()->create(['role' => 'mitra']);
        $mitra = \App\Models\Mitra::create(['user_id' => $mitraUser->id, 'delivery_type' => 'self_delivery']);
        $p = Product::create(['name' => 'P1', 'price' => 10000, 'stock' => 100, 'mitra_id' => $mitra->id, 'category_id' => null, 'is_active' => 1]);

        $res = $this->postJson('/api/admin/featured-products', ['product_id' => $p->id, 'position' => 1]);
        $res->assertStatus(200)->assertJson(['success' => true]);

        // duplicate position should fail
        $p2 = Product::create(['name' => 'P2', 'price' => 20000, 'stock' => 100, 'mitra_id' => $mitra->id, 'category_id' => null, 'is_active' => 1]);
        $res2 = $this->postJson('/api/admin/featured-products', ['product_id' => $p2->id, 'position' => 1]);
        $res2->assertStatus(422);
    }
}
