<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Driver;
use App\Models\Wallet;

class DriverLocationTest extends TestCase
{
    use RefreshDatabase;

    public function test_driver_can_post_location_and_it_is_stored_and_cached()
    {
        $driverUser = User::factory()->create(['role' => 'driver']);
        Wallet::create(['user_id' => $driverUser->id, 'balance' => 0]);
        $driver = Driver::create(['user_id' => $driverUser->id, 'is_online' => true]);

        $this->actingAs($driverUser, 'sanctum');
        $res = $this->postJson('/api/driver/location', ['lat'=>-6.2, 'lng'=>106.8, 'speed'=>10, 'heading'=>90]);
        $res->assertStatus(200);

        $this->assertDatabaseHas('driver_locations', ['driver_id'=>$driver->id, 'lat'=>-6.2]);
        $cached = \Illuminate\Support\Facades\Cache::get('driver:loc:' . $driver->id);
        $this->assertNotNull($cached);
        $this->assertEquals(106.8, $cached['lng']);
    }
}