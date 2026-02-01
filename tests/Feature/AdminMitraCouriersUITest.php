<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Mitra;

class AdminMitraCouriersUITest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_view_mitra_couriers_page()
    {
        $admin = User::factory()->create(['role' => 'admin', 'email' => 'admin@x.test']);
        $mitraUser = User::factory()->create(['role' => 'mitra']);
        $mitra = Mitra::create(['user_id' => $mitraUser->id, 'delivery_type' => 'self_delivery']);

        // simulate admin session token
        $token = $admin->createToken('admin-ui')->plainTextToken;
        $this->withSession(['admin_token' => $token, 'admin_user_id' => $admin->id]);

        $res = $this->get('/admin/mitras/'.$mitra->id.'/couriers');
        $res->assertStatus(200);
        $res->assertSee('Couriers for Mitra');
    }

    public function test_mitra_user_can_access_their_couriers_ui()
    {
        $mitraUser = User::factory()->create(['role' => 'mitra']);
        $mitra = Mitra::create(['user_id' => $mitraUser->id, 'delivery_type' => 'self_delivery']);

        $this->actingAs($mitraUser);
        $res = $this->get('/mitra/couriers');
        $res->assertStatus(200);
        $res->assertSee('My Couriers');
    }
}