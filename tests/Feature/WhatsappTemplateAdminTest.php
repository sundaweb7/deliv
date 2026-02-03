<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\WhatsappTemplate;

class WhatsappTemplateAdminTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_edit_template()
    {
        $this->withSession(['admin_token' => 'ok']);
        $admin = User::factory()->create(['role' => 'admin']);

        $tpl = WhatsappTemplate::firstOrCreate(['key' => 'customer', 'locale' => 'en'], ['body' => 'Old body :order_id']);

        $res = $this->post('/admin/whatsapp-templates/' . $tpl->id, ['body' => 'New body :order_id']);
        $res->assertRedirect('/admin/whatsapp-templates');

        $this->assertDatabaseHas('whatsapp_templates', ['id' => $tpl->id, 'body' => 'New body :order_id']);
    }
}
