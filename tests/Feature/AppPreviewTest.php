<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Slide;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class AppPreviewTest extends TestCase
{
    use RefreshDatabase;

    public function test_app_preview_page_shows_slides_and_products()
    {
        Slide::create(['image' => null, 'order' => 1, 'is_active' => true]);

        // create required related records
        $category = \App\Models\Category::create(['name' => 'Test Cat', 'slug' => 'test-cat']);
        $mitraUser = \App\Models\User::factory()->create(['role' => 'mitra']);
        \App\Models\Mitra::create(['user_id' => $mitraUser->id, 'delivery_type' => 'anyerdeliv']);

        Product::create(['mitra_id' => $mitraUser->mitra->id, 'category_id' => $category->id, 'name' => 'Test Product', 'price' => 10000, 'stock' => 10, 'is_active' => true]);

        $res = $this->get('/app');
        $res->assertStatus(200);
        $res->assertSee('Slides');
        $res->assertSee('Products');
        $res->assertSee('Test Product');
    }
}
