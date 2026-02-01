<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use App\Models\User;
use App\Models\Mitra;

class MitraProductApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_mitra_can_crud_products_with_image()
    {
        Storage::fake('public');

        $user = User::factory()->create(['role' => 'mitra']);
        $this->actingAs($user, 'sanctum');

        $mitra = Mitra::create(['user_id' => $user->id]);

        // create
        $file = UploadedFile::fake()->image('m1.png', 400, 400);
        $res = $this->post('/api/mitra/products', [
            'name' => 'Mitra Product',
            'price' => 5000,
            'stock' => 5,
            'image' => $file,
        ]);
        $res->assertStatus(200)->assertJson(['success' => true]);
        $data = $res->json('data');
        $this->assertNotNull($data['image']);
        Storage::disk('public')->assertExists('products/originals/' . $data['image']);

        $id = $data['id'];

        // update
        $file2 = UploadedFile::fake()->image('m2.png', 200, 200);
        $res2 = $this->post('/api/mitra/products/' . $id, [
            '_method' => 'PUT',
            'name' => 'Mitra Updated',
            'image' => $file2,
        ]);
        $res2->assertStatus(200)->assertJson(['success' => true]);
        $data2 = $res2->json('data');
        $this->assertEquals('Mitra Updated', $data2['name']);
        Storage::disk('public')->assertExists('products/originals/' . $data2['image']);

        // delete
        $res3 = $this->delete('/api/mitra/products/' . $id);
        $res3->assertStatus(200)->assertJson(['success' => true]);
        $this->assertDatabaseMissing('products', ['id' => $id]);
    }
}
