<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginPhoneNormalizationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_with_08_prefix_works_when_user_phone_is_normalized()
    {
        $user = User::create([
            'name' => 'Test',
            'phone' => '+6281234567890',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'role' => 'customer'
        ]);

        $res = $this->postJson('/api/login', [
            'phone' => '081234567890',
            'password' => 'password'
        ]);

        $res->assertStatus(200);
        $res->assertJsonStructure(['success','message','data' => ['user','token']]);
    }

    public function test_login_with_628_prefix_works()
    {
        $user = User::create([
            'name' => 'Test2',
            'phone' => '+6289876543210',
            'email' => 'test2@example.com',
            'password' => Hash::make('password'),
            'role' => 'customer'
        ]);

        $res = $this->postJson('/api/login', [
            'phone' => '6289876543210',
            'password' => 'password'
        ]);

        $res->assertStatus(200);
    }
}