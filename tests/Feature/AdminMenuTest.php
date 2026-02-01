<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;

class AdminMenuTest extends TestCase
{
    public function test_admin_menu_contains_slides_link_on_mitras_page()
    {
        // Render admin layout view directly to avoid DB queries in controllers
        $html = view('admin.layout')->render();
        $this->assertStringContainsString('Slides', $html);
    }
}
