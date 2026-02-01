<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Mitra;
use App\Models\Driver;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderVendor;
use App\Models\Wallet;
use App\Models\Bank;

class DriverCodPayoutTest extends TestCase
{
    use RefreshDatabase;

    public function test_driver_complete_for_cod_processes_payout_and_marks_paid()
    {
        // seed admin
        $admin = User::factory()->create(['role' => 'admin']);
        Wallet::create(['user_id' => $admin->id, 'balance' => 0]);

        // settings: 10% vendor commission, 0 admin delivery cut for simplicity
        \App\Models\Setting::create(['vendor_commission_percent' => 10, 'admin_delivery_cut' => 0, 'courier_share_percent' => 0]);

        // create mitra and user
        $mitraUser = User::factory()->create(['role' => 'mitra']);
        // give mitra enough balance to cover commission (10% of 20000 = 2000)
        Wallet::create(['user_id' => $mitraUser->id, 'balance' => 2000]);
        $mitra = Mitra::create(['user_id' => $mitraUser->id, 'delivery_type' => 'app_driver']);

        // create driver
        $driverUser = User::factory()->create(['role' => 'driver']);
        Wallet::create(['user_id' => $driverUser->id, 'balance' => 0]);
        $driver = Driver::create(['user_id' => $driverUser->id, 'is_online' => true]);

        // create product and order, orderVendor
        $product = Product::create(['mitra_id' => $mitra->id, 'name' => 'Test', 'price' => 20000, 'stock' => 10]);

        $customer = User::factory()->create(['role' => 'customer']);
        Wallet::create(['user_id' => $customer->id, 'balance' => 0]);

        $order = Order::create(['customer_id' => $customer->id, 'order_type' => 'delivery', 'status' => 'pending', 'payment_method' => 'cod', 'payment_status' => 'pending', 'total_food'=>20000,'delivery_fee'=>5000,'admin_profit'=>0,'grand_total'=>25000]);

        $ov = OrderVendor::create(['order_id' => $order->id, 'mitra_id' => $mitra->id, 'subtotal_food' => 20000, 'delivery_type' => 'app_driver', 'status' => 'on_delivery']);

        // create driver route
        \App\Models\DriverRoute::create(['driver_id'=>$driver->id,'order_vendor_id'=>$ov->id,'pickup_sequence'=>0,'pickup_status'=>'accepted']);

        // act as driver
        $this->actingAs($driverUser, 'sanctum');
        $res = $this->postJson('/api/driver/order/'.$ov->id.'/complete');
        $res->assertStatus(200);

        $ov->refresh();
        $order->refresh();
        $mitraWallet = Wallet::where('user_id',$mitraUser->id)->first();
        $adminWallet = Wallet::where('user_id',$admin->id)->first();

        $this->assertTrue($ov->payout_processed);
        $this->assertEquals('paid', $order->payment_status);
        $this->assertGreaterThan(0, $mitraWallet->balance);
        $this->assertGreaterThan(0, $adminWallet->balance);
    }
}