<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use App\Models\User;

class AdminMitraUploadUITest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_mitra_with_store_photo_and_profile_photo_via_ui()
    {
        Storage::fake('public');

        $admin = User::factory()->create(['role'=>'admin']);
        $token = $admin->createToken('admin-ui')->plainTextToken;
        $this->withSession(['admin_token' => $token, 'admin_user_id' => $admin->id]);

        $res = $this->post('/admin/mitras', [
            'name' => 'New Mitra',
            'email' => 'mitraui@x.test',
            'password' => 'password',
            'profile_photo' => UploadedFile::fake()->image('p.jpg'),
            'store_photo' => UploadedFile::fake()->image('s.png'),
        ]);

        $res->assertRedirect('/admin/mitras');

        $this->assertDatabaseHas('mitras', ['business_name' => null]);
        $row = \Illuminate\Support\Facades\DB::table('mitras')->orderBy('id','desc')->first();
        $this->assertNotNull($row->profile_photo);
        $this->assertNotNull($row->store_photo);
        Storage::disk('public')->assertExists('mitra-photos/' . $row->profile_photo);
        Storage::disk('public')->assertExists('mitra-store-photos/' . $row->store_photo);
    }
}