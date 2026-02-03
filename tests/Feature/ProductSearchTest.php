<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Product;
use App\Models\Mitra;
use App\Models\User;

class ProductSearchTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_product_search_by_name_and_description()
    {
        $user = User::factory()->create();
        $m = Mitra::create(['user_id' => $user->id]);
        Product::create(['mitra_id'=>$m->id,'name'=>'Nasi Goreng Special','description'=>'Enak','price'=>10000,'is_active'=>1]);
        Product::create(['mitra_id'=>$m->id,'name'=>'Mie Ayam','description'=>'Lezat','price'=>9000,'is_active'=>1]);

        $res = $this->getJson('/api/products?q=goreng&per_page=5&page=1&sort=name&order=asc');
        $res->assertStatus(200)->assertJson(['success'=>true]);
        $data = $res->json('data');
        $meta = $res->json('meta');
        $this->assertCount(1,$data);
        $this->assertEquals(1, $meta['total']);
        $this->assertStringContainsString('Nasi Goreng', $data[0]['name']);
    }

    public function test_customer_authenticated_search_works()
    {
        $user = User::factory()->create(['role'=>'customer']);
        $this->actingAs($user, 'sanctum');
        $m = Mitra::create(['user_id' => User::factory()->create()->id]);
        Product::create(['mitra_id'=>$m->id,'name'=>'Roti Bakar Coklat','description'=>'Manis','price'=>5000,'is_active'=>1]);

        $res = $this->getJson('/api/customer/products?q=roti');
        $res->assertStatus(200)->assertJson(['success'=>true]);
        $this->assertCount(1, $res->json('data'));
    }
}
