<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use App\Models\Category;

class AdminCategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_category_with_icon()
    {
        Storage::fake('public');

        $this->withSession(['admin_token' => 'test_token']);

        $file = UploadedFile::fake()->image('icon.jpg', 600, 400);

        $response = $this->post(route('admin.categories.store'), [
            'name' => 'Test Cat',
            'order' => 5,
            'icon' => $file,
        ]);

        $response->assertRedirect(route('admin.categories.index'));

        $this->assertDatabaseHas('categories', ['name' => 'Test Cat', 'order' => 5]);

        $cat = Category::where('name','Test Cat')->first();
        $this->assertNotNull($cat->icon);

        Storage::disk('public')->assertExists('categories/originals/' . $cat->icon);
        Storage::disk('public')->assertExists('categories/thumb/' . $cat->icon);
    }
}
