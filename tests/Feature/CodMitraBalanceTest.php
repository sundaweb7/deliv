<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Mitra;
use App\Models\Product;
use App\Models\Wallet;

class CodMitraBalanceTest extends TestCase
{
    use RefreshDatabase;

    public function test_checkout_cod_requires_mitra_balance()
    {
        \App\Models\Setting::create(['vendor_commission_percent' => 10, 'admin_delivery_cut' => 0]);

        $mitraUser = User::factory()->create(['role' => 'mitra']);
        Wallet::create(['user_id' => $mitraUser->id, 'balance' => 0]);
        $mitra = Mitra::create(['user_id' => $mitraUser->id, 'delivery_type' => 'anyerdeliv']);

        $product = Product::create(['mitra_id' => $mitra->id, 'name' => 'Test', 'price' => 20000, 'stock' => 10]);

        $customer = User::factory()->create(['role' => 'customer']);
        Wallet::create(['user_id' => $customer->id, 'balance' => 0]);

        $this->actingAs($customer, 'sanctum');
        $this->postJson('/api/customer/cart/add', ['product_id' => $product->id, 'qty' => 1])->assertStatus(200);

        // Checkout should succeed even if mitra has no balance
        $res = $this->postJson('/api/customer/checkout', ['lat' => 0, 'lng' => 0, 'address' => 'Test', 'payment_method' => 'cod']);
        $res->assertStatus(200);
        $order = \App\Models\Order::first();

        // simulate driver completing the order
        $driverUser = User::factory()->create(['role' => 'driver']);
        Wallet::create(['user_id' => $driverUser->id, 'balance' => 0]);
        $driver = \App\Models\Driver::create(['user_id' => $driverUser->id, 'is_online' => true]);
        \App\Models\DriverRoute::create(['driver_id'=>$driver->id,'order_vendor_id'=>$order->orderVendors()->first()->id,'pickup_sequence'=>0,'pickup_status'=>'accepted']);

        $this->actingAs($driverUser, 'sanctum');
        $res2 = $this->postJson('/api/driver/order/'.$order->orderVendors()->first()->id.'/complete');
        $res2->assertStatus(200);

        $order->refresh();
        $ov = $order->orderVendors()->first();
        $mitra = $ov->mitra->fresh();

        // after completion, mitra store should be auto-closed due to insufficient balance
        $this->assertFalse((bool) $mitra->is_open);
    }
}
