<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Slide;

class AdminSlidesUITest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_view_slides_page()
    {
        $admin = User::factory()->create(['role' => 'admin', 'email' => 'admin@x.test']);
        $token = $admin->createToken('admin-ui')->plainTextToken;
        $this->withSession(['admin_token' => $token, 'admin_user_id' => $admin->id]);

        $res = $this->get('/admin/slides');
        $res->assertStatus(200);
        $res->assertSee('Slides');
    }
}
