<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Mitra;
use App\Models\Product;
use App\Models\Wallet;
use App\Models\DriverRoute;
use App\Models\Setting;

class CheckoutDeliveryOptionsTest extends TestCase
{
    use RefreshDatabase;

    public function test_pickup_single_vendor_no_fee_and_no_driver()
    {
        Setting::create(['vendor_commission_percent' => 10, 'admin_delivery_cut' => 20]);

        $mitraUser = User::factory()->create(['role' => 'mitra']);
        Mitra::create(['user_id' => $mitraUser->id, 'delivery_type' => 'anyerdeliv']);
        $product = Product::create(['mitra_id' => 1, 'name' => 'P', 'price' => 10000, 'stock' => 10]);

        $customer = User::factory()->create(['role' => 'customer']);
        Wallet::create(['user_id' => $customer->id, 'balance' => 100000]);

        $this->actingAs($customer, 'sanctum');
        $this->postJson('/api/customer/cart/add', ['product_id' => $product->id, 'qty' => 1])->assertStatus(200);

        $res = $this->postJson('/api/customer/checkout', ['lat' => 0, 'lng' => 0, 'address' => 'Test', 'payment_method' => 'wallet', 'delivery_option' => 'pickup']);
        if ($res->status() !== 200) {
            $this->fail('Checkout failed: ' . json_encode($res->json()));
        }
        $data = $res->json('data');

        $this->assertEquals('pickup', $data['order_type']);
        $this->assertEquals(0, $data['delivery_fee']);
        // no driver routes should exist
        $this->assertEquals(0, DriverRoute::count());
    }

    public function test_mitra_delivery_single_vendor_uses_mitra_and_no_admin_driver()
    {
        Setting::create(['vendor_commission_percent' => 10, 'admin_delivery_cut' => 20]);

        $mitraUser = User::factory()->create(['role' => 'mitra']);
        $mitra = Mitra::create(['user_id' => $mitraUser->id, 'delivery_type' => 'self_delivery']);
        // create an active courier for this mitra so mitra delivery is allowed
        \App\Models\MitraCourier::create(['mitra_id' => $mitra->id, 'name' => 'Kurir M', 'phone' => '081234', 'vehicle' => 'Motor', 'is_active' => true]);
        $product = Product::create(['mitra_id' => $mitra->id, 'name' => 'P', 'price' => 10000, 'stock' => 10]);

        $customer = User::factory()->create(['role' => 'customer']);
        Wallet::create(['user_id' => $customer->id, 'balance' => 100000]);

        $this->actingAs($customer, 'sanctum');
        $this->postJson('/api/customer/cart/add', ['product_id' => $product->id, 'qty' => 1])->assertStatus(200);

        $res = $this->postJson('/api/customer/checkout', ['lat' => 0, 'lng' => 0, 'address' => 'Test', 'payment_method' => 'wallet', 'delivery_option' => 'mitra']);
        $res->assertStatus(200);
        $data = $res->json('data');

        $this->assertGreaterThan(0, $data['delivery_fee']);
        $this->assertEquals($data['delivery_fee'], array_sum(array_map(function($ov){return $ov['delivery_fee_share'];}, $data['order_vendors'])));
        // mitra delivery: no driver assigned
        $this->assertEquals(0, DriverRoute::count());
    }

    public function test_multi_vendor_forces_admin_and_rejects_pickup_or_mitra()
    {
        Setting::create(['vendor_commission_percent' => 10, 'admin_delivery_cut' => 20]);

        // create two mitras that support app_driver
        for ($i=0;$i<2;$i++) {
            $mu = User::factory()->create(['role' => 'mitra']);
            Mitra::create(['user_id' => $mu->id, 'delivery_type' => 'anyerdeliv']);
            Product::create(['mitra_id' => $i+1, 'name' => 'P'.$i, 'price' => 10000, 'stock' => 10]);
        }

        $customer = User::factory()->create(['role' => 'customer']);
        Wallet::create(['user_id' => $customer->id, 'balance' => 100000]);

        $this->actingAs($customer, 'sanctum');
        $products = \App\Models\Product::all();
        foreach ($products as $p) {
            $this->postJson('/api/customer/cart/add', ['product_id' => $p->id, 'qty' => 1])->assertStatus(200);
        }

        // attempt pickup should fail
        $res = $this->postJson('/api/customer/checkout', ['lat'=>0,'lng'=>0,'address'=>'X','payment_method'=>'wallet','delivery_option'=>'pickup']);
        $res->assertStatus(422);

        // attempt mitra courier should fail for multi-vendor
        $res2 = $this->postJson('/api/customer/checkout', ['lat'=>0,'lng'=>0,'address'=>'X','payment_method'=>'wallet','delivery_option'=>'mitra']);
        $res2->assertStatus(422);

        // admin courier should succeed
        $res3 = $this->postJson('/api/customer/checkout', ['lat'=>0,'lng'=>0,'address'=>'X','payment_method'=>'wallet','delivery_option'=>'admin']);
        $res3->assertStatus(200);
    }

    public function test_single_vendor_cannot_select_admin_if_mitra_not_support()
    {
        Setting::create(['vendor_commission_percent' => 10, 'admin_delivery_cut' => 20]);

        $mitraUser = User::factory()->create(['role' => 'mitra']);
        Mitra::create(['user_id' => $mitraUser->id, 'delivery_type' => 'self_delivery']);
        $product = Product::create(['mitra_id' => 1, 'name' => 'P', 'price' => 10000, 'stock' => 10]);

        $customer = User::factory()->create(['role' => 'customer']);
        Wallet::create(['user_id' => $customer->id, 'balance' => 100000]);

        $this->actingAs($customer, 'sanctum');
        $this->postJson('/api/customer/cart/add', ['product_id' => $product->id, 'qty' => 1])->assertStatus(200);

        $res = $this->postJson('/api/customer/checkout', ['lat'=>0,'lng'=>0,'address'=>'X','payment_method'=>'wallet','delivery_option'=>'admin']);
        $res->assertStatus(422);
    }
}
