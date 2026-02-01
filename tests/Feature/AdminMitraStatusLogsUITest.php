<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Mitra;
use App\Models\MitraStatusLog;

class AdminMitraStatusLogsUITest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_view_mitra_logs_page()
    {
        $admin = User::factory()->create(['role' => 'admin', 'email' => 'admin@x.test']);
        $mitraUser = User::factory()->create(['role' => 'mitra']);
        $mitra = Mitra::create(['user_id' => $mitraUser->id, 'delivery_type' => 'self_delivery']);

        MitraStatusLog::create(['mitra_id' => $mitra->id, 'user_id' => $mitraUser->id, 'old_is_open' => 1, 'new_is_open' => 0, 'reason' => 'break']);

        $token = $admin->createToken('admin-ui')->plainTextToken;
        $this->withSession(['admin_token' => $token, 'admin_user_id' => $admin->id]);

        $res = $this->get('/admin/mitra-logs');
        $res->assertStatus(200);
        $res->assertSee('Mitra Status Logs');
        $res->assertSee('break');
    }

    public function test_admin_can_filter_logs_via_api()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $mitraUser = User::factory()->create(['role' => 'mitra']);
        $mitra = Mitra::create(['user_id' => $mitraUser->id, 'delivery_type' => 'self_delivery']);

        MitraStatusLog::create(['mitra_id' => $mitra->id, 'user_id' => $mitraUser->id, 'old_is_open' => 1, 'new_is_open' => 0, 'reason' => 'break']);
        MitraStatusLog::create(['mitra_id' => $mitra->id, 'user_id' => $mitraUser->id, 'old_is_open' => 0, 'new_is_open' => 1, 'reason' => 'open']);

        $this->actingAs($admin, 'sanctum');
        $res = $this->getJson('/api/admin/mitra-logs?new_is_open=1');
        $res->assertStatus(200)->assertJson(['success' => true]);
        $this->assertCount(1, $res->json('data'));
    }
}
