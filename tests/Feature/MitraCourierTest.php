<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Mitra;
use App\Models\Product;
use App\Models\Wallet;
use App\Models\MitraCourier;

class MitraCourierTest extends TestCase
{
    use RefreshDatabase;

    public function test_mitra_can_manage_couriers_and_mitra_delivery_requires_active_courier()
    {
        $mitraUser = User::factory()->create(['role' => 'mitra']);
        $mitra = Mitra::create(['user_id' => $mitraUser->id, 'delivery_type' => 'self_delivery']);
        $product = Product::create(['mitra_id' => $mitra->id, 'name' => 'P', 'price' => 10000, 'stock' => 10]);

        // act as mitra to create courier
        $this->actingAs($mitraUser, 'sanctum');
        $res = $this->postJson('/api/mitra/couriers', ['name' => 'Kurir A', 'phone' => '081234', 'vehicle' => 'Motor']);
        $res->assertStatus(200);
        $courierId = $res->json('data.id');

        // deactivate courier
        $res2 = $this->putJson('/api/mitra/couriers/'.$courierId, ['is_active' => false]);
        $res2->assertStatus(200);
        $this->assertFalse(MitraCourier::find($courierId)->is_active);

        // try checkout with mitra delivery: should fail because no active courier
        $customer = User::factory()->create(['role' => 'customer']);
        Wallet::create(['user_id' => $customer->id, 'balance' => 100000]);
        $this->actingAs($customer, 'sanctum');
        $this->postJson('/api/customer/cart/add', ['product_id' => $product->id, 'qty' => 1])->assertStatus(200);
        $res3 = $this->postJson('/api/customer/checkout', ['lat'=>0,'lng'=>0,'address'=>'X','payment_method'=>'wallet','delivery_option'=>'mitra']);
        $res3->assertStatus(422);

        // activate courier and try again
        $this->actingAs($mitraUser, 'sanctum');
        $res4 = $this->putJson('/api/mitra/couriers/'.$courierId, ['is_active' => true]);
        $res4->assertStatus(200);

        $this->actingAs($customer, 'sanctum');
        $res5 = $this->postJson('/api/customer/checkout', ['lat'=>0,'lng'=>0,'address'=>'X','payment_method'=>'wallet','delivery_option'=>'mitra']);
        $res5->assertStatus(200);
    }
}
