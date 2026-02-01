<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\DeviceToken;

class DeviceTokenTest extends TestCase
{
    use RefreshDatabase;

    public function test_register_and_unregister_device_token()
    {
        $user = User::factory()->create(['role' => 'customer']);
        $this->actingAs($user, 'sanctum');

        $res = $this->postJson('/api/customer/device-tokens', ['token' => 'tok_123', 'platform' => 'android']);
        $res->assertStatus(200)->assertJson(['success' => true]);
        $this->assertDatabaseHas('device_tokens', ['token' => 'tok_123', 'user_id' => $user->id]);

        $res2 = $this->deleteJson('/api/customer/device-tokens', ['token' => 'tok_123']);
        $res2->assertStatus(200)->assertJson(['success' => true]);
        $this->assertDatabaseMissing('device_tokens', ['token' => 'tok_123']);
    }
}