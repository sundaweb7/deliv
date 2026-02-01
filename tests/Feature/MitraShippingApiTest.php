<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Mitra;
use App\Models\MitraShipping;

class MitraShippingApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_mitra_can_create_shipping_with_rates()
    {
        $user = User::factory()->create(['role' => 'mitra']);
        $mitra = Mitra::create(['user_id' => $user->id, 'delivery_type' => 'self_delivery']);

        $this->actingAs($user, 'sanctum');
        $payload = ['name'=>'Kirim Lokal','description'=>'Ongkir per desa','rates'=>[['destination'=>'Desa A','cost'=>5000],['destination'=>'Desa B','cost'=>10000]]];
        $res = $this->postJson('/api/mitra/shippings', $payload);
        $res->assertStatus(200)->assertJson(['success' => true]);
        $this->assertDatabaseHas('mitra_shippings', ['mitra_id' => $mitra->id, 'name' => 'Kirim Lokal']);
        $this->assertDatabaseHas('mitra_shipping_rates', ['destination'=>'Desa A','cost'=>5000]);
    }
}
