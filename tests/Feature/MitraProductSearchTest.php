<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Mitra;
use App\Models\Product;

class MitraProductSearchTest extends TestCase
{
    use RefreshDatabase;

    public function test_mitra_can_search_own_products()
    {
        $user = User::factory()->create(['role'=>'mitra']);
        $this->actingAs($user, 'sanctum');
        $mitra = Mitra::create(['user_id'=>$user->id]);
        Product::create(['mitra_id'=>$mitra->id,'name'=>'Ayam Bakar','description'=>'Pedas','price'=>12000,'is_active'=>1]);
        Product::create(['mitra_id'=>$mitra->id,'name'=>'Ikan Bakar','description'=>'Lezat','price'=>15000,'is_active'=>1]);

        $res = $this->getJson('/api/mitra/products?q=ayam&per_page=5&page=1&sort=name&order=asc');
        $res->assertStatus(200)->assertJson(['success'=>true]);
        $data = $res->json('data');
        $meta = $res->json('meta');
        $this->assertCount(1, $data);
        $this->assertEquals(1, $meta['total']);
        $this->assertStringContainsString('Ayam', $data[0]['name']);
    }

    public function test_mitra_search_does_not_return_other_mitra_products()
    {
        $user = User::factory()->create(['role'=>'mitra']);
        $this->actingAs($user, 'sanctum');
        $mitra = Mitra::create(['user_id'=>$user->id]);
        $otherMitra = Mitra::create(['user_id'=>User::factory()->create()->id]);
        Product::create(['mitra_id'=>$otherMitra->id,'name'=>'Gudeg','description'=>'Yummy','price'=>10000,'is_active'=>1]);

        $res = $this->getJson('/api/mitra/products?q=gudeg');
        $res->assertStatus(200)->assertJson(['success'=>true]);
        $this->assertCount(0, $res->json('data'));
    }
}
