<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Mitra;
use App\Models\Order;
use App\Models\OrderVendor;
use App\Models\DeviceToken;
use Mockery;

class MitraOrderNotificationTest extends TestCase
{
    use RefreshDatabase;

    public function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function test_mitra_status_update_sends_fcm_to_customer_and_mitra()
    {
        $customer = User::factory()->create(['role' => 'customer']);
        $muser = User::factory()->create(['role' => 'mitra']);
        $mitra = Mitra::create(['user_id' => $muser->id]);

        $order = Order::create(['customer_id' => $customer->id, 'order_type' => 'delivery', 'status' => 'pending']);
        $ov = OrderVendor::create(['order_id' => $order->id, 'mitra_id' => $mitra->id, 'subtotal_food' => 10000, 'status' => 'pending']);

        DeviceToken::create(['user_id' => $customer->id, 'token' => 'cust_tok']);
        DeviceToken::create(['user_id' => $muser->id, 'token' => 'mitra_tok']);

        $this->actingAs($muser, 'sanctum');

        $mock = Mockery::mock(\App\Services\FcmService::class);
        $mock->shouldReceive('sendToTokens')->twice()->andReturnTrue();
        $this->instance(\App\Services\FcmService::class, $mock);

        $res = $this->postJson('/api/mitra/order/' . $ov->id . '/status', ['status' => 'preparing']);
        $res->assertStatus(200)->assertJson(['success' => true]);
    }
}
