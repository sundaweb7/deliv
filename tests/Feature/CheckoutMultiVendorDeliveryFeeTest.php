<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Mitra;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Wallet;

class CheckoutMultiVendorDeliveryFeeTest extends TestCase
{
    use RefreshDatabase;

    protected function haversineKm($lat1, $lng1, $lat2, $lng2)
    {
        $earthRadius = 6371;
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lng2 - $lng1);
        $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon/2) * sin($dLon/2);
        $c = 2 * atan2(sqrt($a), sqrt(1-$a));
        return $earthRadius * $c;
    }

    public function test_multi_vendor_checkout_uses_furthest_vendor_and_splits_fee()
    {
        // settings
        Setting::create(['vendor_commission_percent' => 10, 'admin_delivery_cut' => 20]);

        // create mitras with different distances
        $mitraUser1 = User::factory()->create(['role' => 'mitra']);
        $mitra1 = Mitra::create(['user_id' => $mitraUser1->id, 'lat' => 0.01, 'lng' => 0.0, 'delivery_type' => 'app_driver']);

        $mitraUser2 = User::factory()->create(['role' => 'mitra']);
        $mitra2 = Mitra::create(['user_id' => $mitraUser2->id, 'lat' => 0.02, 'lng' => 0.0, 'delivery_type' => 'app_driver']);

        $mitraUser3 = User::factory()->create(['role' => 'mitra']);
        $mitra3 = Mitra::create(['user_id' => $mitraUser3->id, 'lat' => 0.05, 'lng' => 0.0, 'delivery_type' => 'app_driver']);

        // products
        $p1 = Product::create(['mitra_id' => $mitra1->id, 'name' => 'A', 'price' => 10000, 'stock' => 10]);
        $p2 = Product::create(['mitra_id' => $mitra2->id, 'name' => 'B', 'price' => 10000, 'stock' => 10]);
        $p3 = Product::create(['mitra_id' => $mitra3->id, 'name' => 'C', 'price' => 10000, 'stock' => 10]);

        $customer = User::factory()->create(['role' => 'customer']);
        Wallet::create(['user_id' => $customer->id, 'balance' => 100000]);

        // add to cart
        $this->actingAs($customer, 'sanctum');
        $this->postJson('/api/customer/cart/add', ['product_id' => $p1->id, 'qty' => 1])->assertStatus(200);
        $this->postJson('/api/customer/cart/add', ['product_id' => $p2->id, 'qty' => 1])->assertStatus(200);
        $this->postJson('/api/customer/cart/add', ['product_id' => $p3->id, 'qty' => 1])->assertStatus(200);

        // checkout from customer location lat=0,lng=0
        $res = $this->postJson('/api/customer/checkout', ['lat' => 0, 'lng' => 0, 'address' => 'Test', 'payment_method' => 'wallet']);
        if ($res->status() !== 200) {
            $this->fail('Checkout failed: ' . json_encode($res->json()));
        }
        $data = $res->json('data');

        $this->assertEquals(30000, $data['total_food']);

        // compute expected furthest distance and fee
        $d1 = $this->haversineKm(0,0, 0.01,0);
        $d2 = $this->haversineKm(0,0, 0.02,0);
        $d3 = $this->haversineKm(0,0, 0.05,0);
        $max = max($d1,$d2,$d3);
        $expectedFee = max(5000, round($max * 3000));

        // also compute distances using service (to see what service used)
        $svc = new \App\Services\CheckoutService($customer);
        $rm = new \ReflectionMethod($svc, 'computeDistanceKm');
        $rm->setAccessible(true);
        $sd1 = $rm->invoke($svc, 0.01, 0.0, 0, 0);
        $sd2 = $rm->invoke($svc, 0.02, 0.0, 0, 0);
        $sd3 = $rm->invoke($svc, 0.05, 0.0, 0, 0);

        $this->assertEquals($expectedFee, $data['delivery_fee']);

        // check sum of shares equals delivery fee
        $sumShares = 0;
        $maxShare = 0;
        foreach ($data['order_vendors'] as $ov) {
            $sumShares += (float) $ov['delivery_fee_share'];
            if ((float)$ov['delivery_fee_share'] > $maxShare) $maxShare = (float)$ov['delivery_fee_share'];
        }

        $this->assertEquals($expectedFee, $sumShares);
        // ensure furthest vendor gets the largest share (approx)
        $furthestLat = 0.05;
        $furthestFound = false;
        foreach ($data['order_vendors'] as $ov) {
            if ($ov['mitra_id'] == $mitra3->id) {
                $this->assertEquals($maxShare, (float)$ov['delivery_fee_share']);
                $furthestFound = true;
            }
        }
        $this->assertTrue($furthestFound);
    }
}
