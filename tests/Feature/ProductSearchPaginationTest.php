<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Product;
use App\Models\Mitra;
use App\Models\User;

class ProductSearchPaginationTest extends TestCase
{
    use RefreshDatabase;

    public function test_pagination_and_sorting_work_for_public_products()
    {
        $user = User::factory()->create();
        $m = Mitra::create(['user_id' => $user->id]);

        // create 30 products with varying names
        for ($i = 1; $i <= 30; $i++) {
            Product::create(['mitra_id'=>$m->id,'name'=>'Produk ' . str_pad($i,2,'0',STR_PAD_LEFT),'description'=>'desc','price'=>1000+$i,'is_active'=>1]);
        }

        $res = $this->getJson('/api/products?per_page=10&page=2&sort=name&order=asc');
        $res->assertStatus(200)->assertJson(['success'=>true]);
        $data = $res->json('data');
        $meta = $res->json('meta');
        $this->assertCount(10, $data);
        $this->assertEquals(30, $meta['total']);
        $this->assertEquals(2, $meta['current_page']);
        // assert the first item on page 2 is Produk 11 due to name sort asc
        $this->assertStringContainsString('Produk 11', $data[0]['name']);
    }
}
