<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use App\Models\User;

class MitraProfileUpdateTest extends TestCase
{
    use RefreshDatabase;

    public function test_mitra_can_update_profile_with_address_and_store_photo()
    {
        Storage::fake('public');

        $user = User::factory()->create(['role' => 'mitra']);
        $mitra = \App\Models\Mitra::create(['user_id' => $user->id, 'delivery_type' => 'anyerdeliv']);

        $this->actingAs($user);

        $response = $this->post(route('mitra.profile.update'), [
            'name' => 'Mitra Name',
            'business_name' => 'Toko Mantap',
            'address' => 'Jl Contoh No 1',
            'profile_photo' => UploadedFile::fake()->image('profile.jpg'),
            'store_photo' => UploadedFile::fake()->image('store.png'),
        ]);

        $response->assertRedirect(route('mitra.profile'));

        $user->refresh();
        $mitra->refresh();

        $row = \Illuminate\Support\Facades\DB::table('mitras')->where('user_id', $user->id)->first();
        $this->assertNotNull($row, 'mitra row should exist: ' . json_encode($row));

        $this->assertEquals('Mitra Name', $user->name);
        $this->assertEquals('Toko Mantap', $mitra->business_name);
        $this->assertEquals('Jl Contoh No 1', $mitra->address, 'mitra->address not set, db row:' . json_encode($row));
        $this->assertNotNull($mitra->profile_photo);
        $this->assertNotNull($mitra->store_photo);

        Storage::disk('public')->assertExists('mitra-photos/' . $mitra->profile_photo);
        Storage::disk('public')->assertExists('mitra-store-photos/' . $mitra->store_photo);
    }
}
