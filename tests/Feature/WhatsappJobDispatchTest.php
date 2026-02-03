<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Mitra;
use App\Models\Order;
use App\Models\OrderVendor;
use App\Models\Driver;
use App\Models\DriverRoute;
use Illuminate\Support\Facades\Bus;
use App\Jobs\SendOrderWhatsappNotification;

class WhatsappJobDispatchTest extends TestCase
{
    use RefreshDatabase;

    public function test_mitra_update_status_dispatches_whatsapp_job()
    {
        Bus::fake();

        $customer = User::factory()->create(['role' => 'customer']);
        $muser = User::factory()->create(['role' => 'mitra']);
        $mitra = Mitra::create(['user_id' => $muser->id]);

        $order = Order::create(['customer_id' => $customer->id, 'order_type' => 'delivery', 'status' => 'pending']);
        $ov = OrderVendor::create(['order_id' => $order->id, 'mitra_id' => $mitra->id, 'subtotal_food' => 10000, 'status' => 'pending']);

        $this->actingAs($muser, 'sanctum');
        $res = $this->postJson('/api/mitra/order/' . $ov->id . '/status', ['status' => 'preparing']);
        $res->assertStatus(200);

        Bus::assertDispatched(SendOrderWhatsappNotification::class, function($job) use ($order) { return $job->orderId == $order->id; });
    }

    public function test_driver_accept_dispatches_whatsapp_job()
    {
        Bus::fake();

        $driverUser = User::factory()->create(['role' => 'driver']);
        $driver = Driver::create(['user_id' => $driverUser->id, 'is_online' => true]);

        $cust = User::factory()->create(['role' => 'customer']);
        $muser = User::factory()->create(['role' => 'mitra']);
        $mitra = Mitra::create(['user_id' => $muser->id]);

        $order = Order::create(['customer_id' => $cust->id, 'order_type' => 'delivery', 'status' => 'pending']);
        $ov = OrderVendor::create(['order_id' => $order->id, 'mitra_id' => $mitra->id, 'subtotal_food' => 10000, 'status' => 'pending']);
        \App\Models\DriverRoute::create(['driver_id' => $driver->id, 'order_vendor_id' => $ov->id, 'pickup_sequence' => 1, 'pickup_status' => 'pending']);

        $this->actingAs($driverUser, 'sanctum');
        $res = $this->postJson('/api/driver/order/' . $ov->id . '/accept');
        $res->assertStatus(200);

        Bus::assertDispatched(SendOrderWhatsappNotification::class, function($job) use ($order) { return $job->orderId == $order->id; });
    }

    public function test_admin_mark_paid_dispatches_whatsapp_job()
    {
        Bus::fake();

        $admin = User::factory()->create(['role' => 'admin']);
        $customer = User::factory()->create(['role' => 'customer']);
        $muser = User::factory()->create(['role' => 'mitra']);
        $mitra = Mitra::create(['user_id' => $muser->id]);

        $order = Order::create(['customer_id' => $customer->id, 'order_type' => 'delivery', 'status' => 'pending', 'payment_method' => 'bank_transfer', 'payment_status' => 'pending']);
        $ov = OrderVendor::create(['order_id' => $order->id, 'mitra_id' => $mitra->id, 'subtotal_food' => 10000, 'status' => 'delivered', 'payout_processed' => false]);

        $this->actingAs($admin, 'sanctum');
        $res = $this->postJson('/api/admin/orders/' . $order->id . '/mark-paid');
        $res->assertStatus(200);

        Bus::assertDispatched(SendOrderWhatsappNotification::class, function($job) use ($order) { return $job->orderId == $order->id; });
    }
}
