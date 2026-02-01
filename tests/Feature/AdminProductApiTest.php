<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use App\Models\User;
use App\Models\Mitra;

class AdminProductApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_crud_product_with_image()
    {
        Storage::fake('public');

        $admin = User::factory()->create(['role' => 'admin']);
        $this->actingAs($admin, 'sanctum');

        $mitraUser = \App\Models\User::factory()->create(['role'=>'mitra']);
        $mitra = Mitra::create(['user_id' => $mitraUser->id]);

        // create
        $file = UploadedFile::fake()->image('p1.png', 400, 400);
        $res = $this->post('/api/admin/products', [
            'name' => 'API Product',
            'price' => 10000,
            'stock' => 10,
            'mitra_id' => $mitra->id,
            'image' => $file,
        ]);
        $res->assertStatus(201)->assertJson(['success' => true]);
        $data = $res->json('data');
        $this->assertNotNull($data['image']);
        Storage::disk('public')->assertExists('products/originals/' . $data['image']);

        $productId = $data['id'];

        // update with new image
        $file2 = UploadedFile::fake()->image('p2.png', 200, 200);
        $res2 = $this->post('/api/admin/products/' . $productId, [
            '_method' => 'PUT',
            'name' => 'Updated Name',
            'image' => $file2,
        ]);
        $res2->assertStatus(200)->assertJson(['success' => true]);
        $data2 = $res2->json('data');
        $this->assertEquals('Updated Name', $data2['name']);
        Storage::disk('public')->assertExists('products/originals/' . $data2['image']);

        // delete
        $res3 = $this->deleteJson('/api/admin/products/' . $productId);
        $res3->assertStatus(200)->assertJson(['success' => true]);
        // Ensure not present in db
        $this->assertDatabaseMissing('products', ['id' => $productId]);
    }
}
