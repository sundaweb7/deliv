<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Mitra;
use App\Models\Product;
use App\Models\Setting;
use App\Jobs\SendOrderWhatsappNotification;

class OrderWhatsappNotificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_order_triggers_whatsapp_messages_for_customer_and_mitra()
    {
        // Prepare settings
        $settings = Setting::create([
            'vendor_commission_percent' => 70,
            'admin_delivery_cut' => 2000,
            'wa_provider' => 'fontee',
            'wa_api_key' => 'TEST_TOKEN',
            'wa_device_id' => '6285171719637',
            'wa_enabled' => 1,
            'wa_send_to_customer' => 1,
            'wa_send_to_mitra' => 1,
        ]);

        // Fake HTTP to Fonnte
        Http::fake([
            'https://api.fonnte.com/*' => Http::response(['status' => true, 'detail' => 'success'], 200),
        ]);

        // Create user and mitra + product
        $user = User::factory()->create(['phone' => '085171719637', 'role' => 'customer']);
        $mitraUser = User::factory()->create(['phone' => '085217144629', 'role' => 'mitra']);
        $mitra = Mitra::create(['user_id' => $mitraUser->id, 'business_name' => 'Warung Test', 'wa_number' => '085217144629']);
        $product = Product::create(['mitra_id' => $mitra->id, 'name' => 'Produk Test', 'price' => 10000, 'is_active' => 1]);

        // create order via service or endpoint
        $this->actingAs($user, 'sanctum');

        $res = $this->postJson('/api/customer/checkout', [
            'items' => [['product_id' => $product->id, 'qty' => 1]],
            'payment_method' => 'cod',
            'lat' => -6.2,
            'lng' => 106.8,
            'address' => 'Test Address'
        ]);

        $res->assertStatus(200);
        $orderId = $res->json('data.id') ?? $res->json('data')['id'] ?? null;
        $this->assertNotNull($orderId, 'Order id should be present');

        // Run job synchronously to simulate worker
        SendOrderWhatsappNotification::dispatchSync($orderId);

        // Assert that at least two messages were sent (customer + mitra)
        // Ensure at least two requests were sent in total
        $this->assertGreaterThanOrEqual(2, collect(Http::recorded())->count());

        // Check that both customer and mitra target numbers were included in requests
        Http::assertSent(function ($request) {
            return strpos($request->body(), '6285171719637') !== false;
        });

        Http::assertSent(function ($request) {
            return strpos($request->body(), '6285217144629') !== false;
        });
    }
}

