<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Mitra;
use App\Models\Product;
use App\Models\MitraCourier;
use App\Models\Wallet;

class MitraCourierQueueTest extends TestCase
{
    use RefreshDatabase;

    public function test_courier_queue_limits_to_five_and_queues_additional_orders()
    {
        // setup mitra & courier
        $mitraUser = User::factory()->create(['role' => 'mitra']);
        $mitra = Mitra::create(['user_id' => $mitraUser->id, 'delivery_type' => 'self_delivery']);
        $courier = MitraCourier::create(['mitra_id' => $mitra->id, 'name' => 'Q', 'phone' => '081', 'vehicle' => 'motor', 'is_active' => true]);

        // product
        $product = Product::create(['mitra_id' => $mitra->id, 'name' => 'P', 'price' => 10000, 'stock' => 100]);

        // create 7 customers and each checkout with delivery_option mitra
        for ($i=0;$i<7;$i++) {
            $cust = User::factory()->create(['role' => 'customer']);
            Wallet::create(['user_id' => $cust->id, 'balance' => 100000]);
            $this->actingAs($cust, 'sanctum');
            $this->postJson('/api/customer/cart/add', ['product_id' => $product->id, 'qty' => 1])->assertStatus(200);
            $res = $this->postJson('/api/customer/checkout', ['lat'=>0,'lng'=>0,'address'=>'X','payment_method'=>'wallet','delivery_option'=>'mitra']);
            $res->assertStatus(200);
        }

        $this->assertEquals(7, \App\Models\CourierRoute::count());
        $queued = \App\Models\CourierRoute::where('pickup_status','queued')->count();
        $this->assertEquals(2, $queued);
        $pending = \App\Models\CourierRoute::where('pickup_status','pending')->count();
        $this->assertEquals(5, $pending);
    }
}
