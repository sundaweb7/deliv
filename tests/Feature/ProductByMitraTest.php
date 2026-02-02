<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Mitra;
use App\Models\Product;
use App\Models\User;

class ProductByMitraTest extends TestCase
{
    use RefreshDatabase;

    public function test_products_can_be_filtered_by_mitra()
    {
        $mitraUser = User::factory()->create(['role' => 'mitra']);
        $m = Mitra::create(['user_id' => $mitraUser->id, 'delivery_type' => 'self_delivery', 'is_active' => 1]);
        $p = Product::create(['mitra_id' => $m->id, 'name' => 'Mitra Product', 'price' => 1000, 'stock' => 5, 'is_active' => 1]);

        $res = $this->getJson('/api/products?mitra=' . $m->id);
        $res->assertStatus(200)->assertJsonFragment(['name' => 'Mitra Product']);
    }
}
