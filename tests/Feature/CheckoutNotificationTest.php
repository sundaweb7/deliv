<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Mitra;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\DeviceToken;
use Illuminate\Support\Str;
use Mockery;

class CheckoutNotificationTest extends TestCase
{
    use RefreshDatabase;

    public function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function test_checkout_sends_fcm_to_customer_and_mitra()
    {
        $cust = User::factory()->create(['role' => 'customer']);
        $this->actingAs($cust, 'sanctum');

        $muser = User::factory()->create(['role' => 'mitra']);
        $mitra = Mitra::create(['user_id' => $muser->id, 'is_open' => true]);

        $product = Product::create(['mitra_id' => $mitra->id, 'name' => 'Test Prod', 'price' => 10000, 'is_active' => 1]);

        $cart = Cart::create(['user_id' => $cust->id]);
        CartItem::create(['cart_id' => $cart->id, 'product_id' => $product->id, 'qty' => 1, 'price' => 10000]);

        DeviceToken::create(['user_id' => $cust->id, 'token' => 'cust_tok']);
        DeviceToken::create(['user_id' => $muser->id, 'token' => 'mitra_tok']);

        // mock FcmService and expect two calls (customer and mitra)
        $mock = Mockery::mock(\App\Services\FcmService::class);
        $mock->shouldReceive('sendToTokens')
            ->once()
            ->withArgs(function($tokens, $title, $body, $data=null) use ($cust) {
                return in_array('cust_tok', $tokens) && Str::contains($title, 'Order');
            })
            ->andReturnTrue();
        $mock->shouldReceive('sendToTokens')
            ->once()
            ->withArgs(function($tokens, $title, $body, $data=null) use ($muser) {
                return in_array('mitra_tok', $tokens) && Str::contains($title, 'New order');
            })
            ->andReturnTrue();

        $this->instance(\App\Services\FcmService::class, $mock);

        $res = $this->postJson('/api/customer/checkout', ['lat' => 0, 'lng' => 0, 'address' => 'addr', 'payment_method' => 'bank_transfer']);
        $res->assertStatus(200)->assertJson(['success' => true]);
    }
}
