<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Mitra;
use App\Models\Product;
use App\Models\Setting;
use App\Models\WhatsappLog;

class WhatsappLogsAdminTest extends TestCase
{
    use RefreshDatabase;

    public function test_wa_logs_created_and_resend_endpoint_works()
    {
        // Setup settings and fake HTTP
        Setting::create(['vendor_commission_percent' => 70, 'admin_delivery_cut' => 2000, 'wa_provider' => 'fontee', 'wa_api_key' => 'TEST', 'wa_device_id' => '6285171719637', 'wa_enabled' => 1, 'wa_send_to_customer' => 1, 'wa_send_to_mitra' => 1]);
        Http::fake(['https://api.fonnte.com/*' => Http::response(['status' => true, 'detail' => 'ok'], 200)]);

        // Create data and perform checkout to trigger job
        $user = User::factory()->create(['phone' => '085171719637', 'role' => 'customer']);
        $mitraUser = User::factory()->create(['phone' => '085217144629', 'role' => 'mitra']);
        $mitra = Mitra::create(['user_id' => $mitraUser->id, 'business_name' => 'Warung Test', 'wa_number' => '085217144629']);
        $product = Product::create(['mitra_id' => $mitra->id, 'name' => 'Produk Test', 'price' => 10000, 'is_active' => 1]);

        $this->actingAs($user, 'sanctum');
        $res = $this->postJson('/api/customer/checkout', ['items' => [['product_id' => $product->id, 'qty' => 1]], 'payment_method' => 'cod', 'lat' => -6.2, 'lng' => 106.8, 'address' => 'Test']);
        $res->assertStatus(200);

        // run job sync
        $orderId = $res->json('data.id') ?? $res->json('data')['id'];
        \App\Jobs\SendOrderWhatsappNotification::dispatchSync($orderId);

        // assert logs created
        $this->assertDatabaseHas('whatsapp_logs', ['order_id' => $orderId, 'target' => '+6285171719637']);

        $log = WhatsappLog::first();

        // Acting as admin (set session key to bypass admin login)
        $initial = count(Http::recorded());
        $this->withSession(['admin_token' => 'abc'])->post('/admin/wa-logs/' . $log->id . '/resend')->assertRedirect();

        // Resend should trigger one more HTTP send (at least)
        $this->assertEquals($initial + 1, count(Http::recorded()));
    }
}
