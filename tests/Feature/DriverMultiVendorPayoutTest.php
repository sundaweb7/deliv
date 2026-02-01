<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Mitra;
use App\Models\Product;
use App\Models\Wallet;
use App\Models\Setting;

class DriverMultiVendorPayoutTest extends TestCase
{
    use RefreshDatabase;

    public function test_driver_complete_multi_vendor_payouts_and_marks_order_paid_for_cod()
    {
        Setting::create(['vendor_commission_percent' => 10, 'admin_delivery_cut' => 20]);

        // admin
        $admin = User::factory()->create(['role' => 'admin']);
        Wallet::create(['user_id' => $admin->id, 'balance' => 0]);

        // mitras
        $mitraUsers = [];
        $mitras = [];
        for ($i=0;$i<3;$i++) {
            $mu = User::factory()->create(['role' => 'mitra']);
            // provide initial wallet balance so mitra can be charged commission on COD
            Wallet::create(['user_id' => $mu->id, 'balance' => 10000]);
            $m = Mitra::create(['user_id' => $mu->id, 'lat' => 0.0+$i*0.01, 'lng' => 0.0, 'delivery_type' => 'app_driver']);
            $mitraUsers[] = $mu;
            $mitras[] = $m;
        }

        // driver
        $driverUser = User::factory()->create(['role' => 'driver']);
        Wallet::create(['user_id' => $driverUser->id, 'balance' => 0]);
        $driver = \App\Models\Driver::create(['user_id' => $driverUser->id, 'is_online' => true]);

        // products and customer
        foreach ($mitras as $i => $m) {
            Product::create(['mitra_id' => $m->id, 'name' => 'P'.$i, 'price' => 10000, 'stock' => 10]);
        }

        $customer = User::factory()->create(['role' => 'customer']);
        Wallet::create(['user_id' => $customer->id, 'balance' => 100000]);

        // add to cart and checkout (cod)
        $this->actingAs($customer, 'sanctum');
        $products = \App\Models\Product::all();
        foreach ($products as $p) {
            $this->postJson('/api/customer/cart/add', ['product_id' => $p->id, 'qty' => 1])->assertStatus(200);
        }

        $res = $this->postJson('/api/customer/checkout', ['lat' => 0, 'lng' => 0, 'address' => 'Test', 'payment_method' => 'cod']);
        $res->assertStatus(200);
        $order = \App\Models\Order::first();

        // create driver routes as accepted
        foreach ($order->orderVendors as $ov) {
            \App\Models\DriverRoute::create(['driver_id' => $driver->id, 'order_vendor_id' => $ov->id, 'pickup_sequence' => 0, 'pickup_status' => 'accepted']);
        }

        $this->actingAs($driverUser, 'sanctum');

        $adminWalletBefore = Wallet::where('user_id', $admin->id)->first()->balance;

        foreach ($order->orderVendors as $ov) {
            $res = $this->postJson('/api/driver/order/'.$ov->id.'/complete');
            $res->assertStatus(200);
            $ov->refresh();
            $this->assertTrue($ov->payout_processed);

            $mitraWallet = Wallet::where('user_id', $ov->mitra->user->id)->first();
            $this->assertGreaterThan(0, $mitraWallet->balance);
        }

        $order->refresh();
        $this->assertEquals('paid', $order->payment_status);

        $adminWalletAfter = Wallet::where('user_id', $admin->id)->first()->balance;
        $this->assertGreaterThan($adminWalletBefore, $adminWalletAfter);
    }
}
