<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Mitra;
use App\Models\Product;
use App\Models\Setting;
use App\Models\WhatsappTemplate;

class WhatsappTemplateUsageTest extends TestCase
{
    use RefreshDatabase;

    public function test_db_template_used_for_customer_message()
    {
        config(['app.locale' => 'en']);

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

        // Put a custom DB template for customer (upsert)
        \App\Models\WhatsappTemplate::updateOrCreate(['key' => 'customer', 'locale' => 'en'], ['body' => 'DB TEMPLATE ORDER :order_id']);

        Http::fake(['https://api.fonnte.com/*' => Http::response(['status' => true], 200)]);

        $user = User::factory()->create(['phone' => '085171719637', 'role' => 'customer']);
        $muser = User::factory()->create(['phone' => '085217144629', 'role' => 'mitra']);
        $mitra = Mitra::create(['user_id' => $muser->id, 'business_name' => 'Warung Test', 'wa_number' => '085217144629']);
        $product = Product::create(['mitra_id' => $mitra->id, 'name' => 'Produk Test', 'price' => 10000, 'is_active' => 1]);

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

        // Run job sync
        \App\Jobs\SendOrderWhatsappNotification::dispatchSync($orderId);

        Http::assertSent(function ($request) use ($orderId) {
            return strpos($request->body(), 'DB TEMPLATE ORDER ' . $orderId) !== false;
        });
    }
}
