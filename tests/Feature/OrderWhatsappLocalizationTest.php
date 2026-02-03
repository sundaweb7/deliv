<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Mitra;
use App\Models\Product;
use App\Models\Setting;

class OrderWhatsappLocalizationTest extends TestCase
{
    use RefreshDatabase;

    public function test_order_whatsapp_respects_locale_for_customer_and_mitra()
    {
        // Force English locale globally for this test
        config(['app.locale' => 'en']);

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

        Http::fake([
            'https://api.fonnte.com/*' => Http::response(['status' => true, 'detail' => 'success'], 200),
        ]);

        // Create user and mitra + product
        $user = User::factory()->create(['phone' => '085171719637', 'role' => 'customer']);
        $mitraUser = User::factory()->create(['phone' => '085217144629', 'role' => 'mitra']);
        $mitra = Mitra::create(['user_id' => $mitraUser->id, 'business_name' => 'Warung Test', 'wa_number' => '085217144629']);
        $product = Product::create(['mitra_id' => $mitra->id, 'name' => 'Produk Test', 'price' => 10000, 'is_active' => 1]);

        // create order via endpoint
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
        $this->assertNotNull($orderId);

        // Run job synchronously
        \App\Jobs\SendOrderWhatsappNotification::dispatchSync($orderId);

        // Ensure English phrases present
        Http::assertSent(function ($request) {
            return strpos($request->body(), 'Your order') !== false || strpos($request->body(), 'New order for Mitra') !== false;
        });
    }
}
