<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Mitra;

class MitraStoreTest extends TestCase
{
    use RefreshDatabase;

    public function test_mitra_can_toggle_store_via_api()
    {
        $user = User::factory()->create(['role' => 'mitra']);
        $mitra = Mitra::create(['user_id' => $user->id, 'delivery_type' => 'self_delivery', 'is_active' => 1]);

        $this->actingAs($user, 'sanctum');
        $res = $this->postJson('/api/mitra/store/open', ['is_open' => false]);
        $res->assertStatus(200)->assertJson(['success' => true]);
        $this->assertFalse((bool) $mitra->fresh()->is_open);

        $res2 = $this->postJson('/api/mitra/store/open', ['is_open' => true]);
        $res2->assertStatus(200)->assertJson(['success' => true]);
        $this->assertTrue((bool) $mitra->fresh()->is_open);
    }

    public function test_mitra_store_ui_accessible_and_toggle()
    {
        $user = User::factory()->create(['role' => 'mitra']);
        $mitra = Mitra::create(['user_id' => $user->id, 'delivery_type' => 'self_delivery', 'is_active' => 1, 'is_open' => 1]);

        $this->actingAs($user);
        $res = $this->get('/mitra/store');
        $res->assertStatus(200);
        $res->assertSee('My Store');

        $res2 = $this->post('/mitra/store/toggle', ['is_open' => 0]);
        $res2->assertRedirect();
        $this->assertFalse((bool) $mitra->fresh()->is_open);
    }
}
