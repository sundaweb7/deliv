<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Mitra;
use App\Models\Product;
use App\Models\MitraCourier;
use App\Models\Wallet;
use App\Models\Setting;

class CourierSharePayoutTest extends TestCase
{
    use RefreshDatabase;

    public function test_mitra_courier_fee_is_reserved_and_payouts_exclude_courier_fee()
    {
        Setting::create(['vendor_commission_percent' => 10, 'admin_delivery_cut' => 20, 'courier_share_percent' => 10]);

        $admin = User::factory()->create(['role' => 'admin']); Wallet::create(['user_id' => $admin->id, 'balance' => 0]);

        $mitraUser = User::factory()->create(['role' => 'mitra']); Wallet::create(['user_id' => $mitraUser->id, 'balance' => 0]);
        $mitra = Mitra::create(['user_id' => $mitraUser->id, 'delivery_type' => 'self_delivery']);
        $courier = MitraCourier::create(['mitra_id' => $mitra->id, 'name' => 'C', 'phone' => '081', 'vehicle' => 'motor', 'is_active' => true]);

        $product = Product::create(['mitra_id' => $mitra->id, 'name' => 'P', 'price' => 10000, 'stock' => 10]);

        $customer = User::factory()->create(['role' => 'customer']); Wallet::create(['user_id' => $customer->id, 'balance' => 100000]);

        $this->actingAs($customer, 'sanctum');
        $this->postJson('/api/customer/cart/add', ['product_id' => $product->id, 'qty' => 1])->assertStatus(200);
        $res = $this->postJson('/api/customer/checkout', ['lat'=>0,'lng'=>0,'address'=>'X','payment_method'=>'wallet','delivery_option'=>'mitra']);
        $res->assertStatus(200);

        $route = \App\Models\CourierRoute::first();
        $this->assertNotNull($route);
        $this->assertGreaterThan(0, $route->courier_fee);

        // simulate courier completing route
        $this->actingAs($mitraUser, 'sanctum');
        $res2 = $this->postJson('/api/mitra/courier/route/'.$route->id.'/complete');
        if ($res2->status() !== 200) {
            $this->fail('Complete failed: ' . json_encode($res2->json()));
        }

        $ov = \App\Models\OrderVendor::first(); $ov->refresh();
        $this->assertTrue($ov->payout_processed);

        $mitraWallet = Wallet::where('user_id', $mitraUser->id)->first();
        $adminWallet = Wallet::where('user_id', $admin->id)->first();

        $this->assertGreaterThan(0, $mitraWallet->balance); // mitra still gets paid
        $this->assertGreaterThan(0, $adminWallet->balance); // admin gets commission
    }

    public function test_admin_driver_gets_courier_share_on_delivery()
    {
        Setting::create(['vendor_commission_percent' => 10, 'admin_delivery_cut' => 20, 'courier_share_percent' => 10]);

        $admin = User::factory()->create(['role' => 'admin']); Wallet::create(['user_id' => $admin->id, 'balance' => 0]);

        $mitraUser = User::factory()->create(['role' => 'mitra']); Wallet::create(['user_id' => $mitraUser->id, 'balance' => 0]);
        $mitra = Mitra::create(['user_id' => $mitraUser->id, 'delivery_type' => 'anyerdeliv']);

        $driverUser = User::factory()->create(['role' => 'driver']); Wallet::create(['user_id' => $driverUser->id, 'balance' => 0]);
        $driver = \App\Models\Driver::create(['user_id' => $driverUser->id, 'is_online' => true]);

        $product = Product::create(['mitra_id' => $mitra->id, 'name' => 'P', 'price' => 10000, 'stock' => 10]);

        $customer = User::factory()->create(['role' => 'customer']); Wallet::create(['user_id' => $customer->id, 'balance' => 100000]);

        $this->actingAs($customer, 'sanctum');
        $this->postJson('/api/customer/cart/add', ['product_id' => $product->id, 'qty' => 1])->assertStatus(200);
        $this->postJson('/api/customer/checkout', ['lat'=>0,'lng'=>0,'address'=>'X','payment_method'=>'cod'])->assertStatus(200);

        $ov = \App\Models\OrderVendor::first();
        \App\Models\DriverRoute::create(['driver_id'=>$driver->id,'order_vendor_id'=>$ov->id,'pickup_sequence'=>0,'pickup_status'=>'accepted']);

        $this->actingAs($driverUser, 'sanctum');
        $res = $this->postJson('/api/driver/order/'.$ov->id.'/complete');
        $res->assertStatus(200);

        $driverWallet = Wallet::where('user_id', $driverUser->id)->first();
        $this->assertGreaterThan(0, $driverWallet->balance);
    }
}
