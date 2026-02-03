<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Driver;
use App\Models\Mitra;
use App\Models\Order;
use App\Models\OrderVendor;
use App\Models\DriverRoute;
use App\Models\DeviceToken;
use Mockery;

class DriverNotificationTest extends TestCase
{
    use RefreshDatabase;

    public function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function test_driver_accept_notifies_customer_and_mitra()
    {
        $driverUser = User::factory()->create(['role' => 'driver']);
        $driver = Driver::create(['user_id' => $driverUser->id, 'is_online' => true]);

        $cust = User::factory()->create(['role' => 'customer']);
        $muser = User::factory()->create(['role' => 'mitra']);
        $mitra = Mitra::create(['user_id' => $muser->id]);

        $order = Order::create(['customer_id' => $cust->id, 'order_type' => 'delivery', 'status' => 'pending']);
        $ov = OrderVendor::create(['order_id' => $order->id, 'mitra_id' => $mitra->id, 'subtotal_food' => 10000, 'status' => 'pending']);

        // create driver route assigned to driver
        DriverRoute::create(['driver_id' => $driver->id, 'order_vendor_id' => $ov->id, 'pickup_sequence' => 1, 'pickup_status' => 'pending']);

        DeviceToken::create(['user_id' => $cust->id, 'token' => 'cust_tok']);
        DeviceToken::create(['user_id' => $muser->id, 'token' => 'mitra_tok']);

        $this->actingAs($driverUser, 'sanctum');

        $mock = Mockery::mock(\App\Services\FcmService::class);
        $mock->shouldReceive('sendToTokens')->twice()->andReturnTrue();
        $this->instance(\App\Services\FcmService::class, $mock);

        $res = $this->postJson('/api/driver/order/' . $ov->id . '/accept');
        $res->assertStatus(200)->assertJson(['success' => true]);
    }
}
