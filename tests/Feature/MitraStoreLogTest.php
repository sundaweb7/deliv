<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Mitra;
use App\Models\MitraStatusLog;

class MitraStoreLogTest extends TestCase
{
    use RefreshDatabase;

    public function test_api_toggling_creates_log()
    {
        $user = User::factory()->create(['role' => 'mitra']);
        $mitra = Mitra::create(['user_id' => $user->id, 'delivery_type' => 'self_delivery', 'is_active' => 1, 'is_open' => 1]);

        $this->actingAs($user, 'sanctum');
        $res = $this->postJson('/api/mitra/store/open', ['is_open' => false, 'reason' => 'Tutup sementara']);
        $res->assertStatus(200)->assertJson(['success' => true]);

        $this->assertDatabaseHas('mitra_status_logs', [
            'mitra_id' => $mitra->id,
            'user_id' => $user->id,
            'old_is_open' => 1,
            'new_is_open' => 0,
            'reason' => 'Tutup sementara'
        ]);
    }

    public function test_web_toggle_creates_log_and_logs_endpoint_returns_items()
    {
        $user = User::factory()->create(['role' => 'mitra']);
        $mitra = Mitra::create(['user_id' => $user->id, 'delivery_type' => 'self_delivery', 'is_active' => 1, 'is_open' => 1]);

        $this->actingAs($user);
        $this->post('/mitra/store/toggle', ['is_open' => 0])->assertRedirect();

        $this->assertDatabaseHas('mitra_status_logs', [
            'mitra_id' => $mitra->id,
            'user_id' => $user->id,
            'new_is_open' => 0
        ]);

        $this->actingAs($user, 'sanctum');
        $res = $this->getJson('/api/mitra/store/logs');
        $res->assertStatus(200)->assertJson(['success' => true]);
        $this->assertGreaterThanOrEqual(1, count($res->json('data')));
    }
}
