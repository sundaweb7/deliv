<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Mitra;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\MitraShipping;
use App\Models\MitraShippingRate;

class CheckoutMitraShippingTest extends TestCase
{
    use RefreshDatabase;

    public function test_checkout_uses_selected_mitra_shipping_rate_for_single_vendor_mitra_delivery()
    {
        // setup setting
        \App\Models\Setting::create(['vendor_commission_percent' => 10, 'admin_delivery_cut' => 20, 'courier_share_percent' => 10]);

        $mitraUser = User::factory()->create(['role' => 'mitra']);
        $mitra = Mitra::create(['user_id' => $mitraUser->id, 'delivery_type' => 'self_delivery']);

        // create a mitra courier so mitra->hasActiveCourier returns true
        \App\Models\MitraCourier::create(['mitra_id' => $mitra->id, 'name' => 'Kurir','phone' => '08123456789', 'is_active'=>true]);

        $product = Product::create(['name' => 'P1', 'price' => 10000, 'stock'=>10, 'mitra_id' => $mitra->id, 'is_active'=>1]);

        $customer = User::factory()->create(['role' => 'customer']);
        $cart = \App\Models\Cart::create(['user_id' => $customer->id]);
        \App\Models\CartItem::create(['cart_id' => $cart->id, 'product_id'=>$product->id, 'qty'=>1, 'price'=>$product->price]);
        \App\Models\Wallet::create(['user_id' => $customer->id, 'balance' => 20000]);

        $shipping = MitraShipping::create(['mitra_id'=>$mitra->id, 'name'=>'Local','is_active'=>true]);
        $rate = MitraShippingRate::create(['mitra_shipping_id'=>$shipping->id, 'destination'=>'Desa A', 'cost'=>5000, 'is_active'=>true]);

        $this->actingAs($customer, 'sanctum');
        $res = $this->postJson('/api/customer/checkout', ['lat'=>0,'lng'=>0,'address'=>'X','payment_method'=>'wallet','delivery_option'=>'mitra','mitra_shipping'=>[$mitra->id => $rate->id]]);
        if ($res->getStatusCode() !== 200) { $this->fail('Checkout failed: ' . $res->getContent()); }
        $res->assertStatus(200)->assertJson(['success' => true]);

        $order = \App\Models\Order::first();
        $ov = $order->orderVendors()->first();
        $this->assertEquals(5000, $ov->delivery_fee_share);
        $this->assertEquals($rate->id, $ov->shipping_rate_id);
        $this->assertEquals($shipping->id, $ov->shipping_model_id);
    }

    public function test_invalid_rate_for_mitra_throws_error()
    {
        $mitraUser = User::factory()->create(['role' => 'mitra']);
        $mitra = Mitra::create(['user_id' => $mitraUser->id, 'delivery_type' => 'self_delivery']);
        $product = Product::create(['name' => 'P1', 'price' => 10000, 'stock'=>10, 'mitra_id' => $mitra->id, 'is_active'=>1]);

        $customer = User::factory()->create(['role' => 'customer']);
        $cart = \App\Models\Cart::create(['user_id' => $customer->id]);
        \App\Models\CartItem::create(['cart_id' => $cart->id, 'product_id'=>$product->id, 'qty'=>1, 'price'=>$product->price]);
        \App\Models\Wallet::create(['user_id' => $customer->id, 'balance' => 20000]);

        $this->actingAs($customer, 'sanctum');
        // invalid rate 999
        $res = $this->postJson('/api/customer/checkout', ['lat'=>0,'lng'=>0,'address'=>'X','payment_method'=>'wallet','delivery_option'=>'mitra','mitra_shipping'=>[$mitra->id => 999]]);
        $res->assertStatus(422);
    }
}
