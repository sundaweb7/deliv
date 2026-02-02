<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class PhoneNormalizationTest extends TestCase
{
    use RefreshDatabase;

    public function test_register_normalizes_phone()
    {
        $res = $this->postJson('/api/register', [
            'name' => 'Test User',
            'phone' => '081234567890',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $res->assertStatus(200);
        $this->assertDatabaseHas('users', [ 'phone' => '+6281234567890' ]);
    }

    public function test_mitra_profile_update_normalizes_wa_number()
    {
        $user = User::factory()->create(['role' => 'mitra']);
        $mitra = \App\Models\Mitra::create(['user_id' => $user->id, 'delivery_type' => 'anyerdeliv']);
        $this->actingAs($user);

        $res = $this->post(route('mitra.profile.update'), [
            'wa_number' => '081234567890'
        ]);

        $res->assertRedirect();
        $this->assertDatabaseHas('mitras', [ 'wa_number' => '+6281234567890' ]);
    }
}
