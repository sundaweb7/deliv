<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Storage;
use App\Models\Slide;

class SlideImageTest extends TestCase
{
    use RefreshDatabase;

    public function test_slide_image_endpoint_serves_svg()
    {
        Storage::fake('public');
        Storage::disk('public')->put('slides/test_slide.svg', '<svg></svg>');

        $s = Slide::create(['image' => 'test_slide.svg', 'order' => 1, 'is_active' => true]);

        $res = $this->get('/slides/image/test_slide.svg');
        $res->assertStatus(200);
        $res->assertHeader('Content-Type');
    }

    public function test_slide_image_url_in_api_is_valid()
    {
        Storage::fake('public');
        Storage::disk('public')->put('slides/test_slide2.svg', '<svg></svg>');
        $s = Slide::create(['image' => 'test_slide2.svg', 'order' => 1, 'is_active' => true]);

        $res = $this->getJson('/api/slides');
        $res->assertStatus(200);
        $this->assertStringContainsString('/slides/image/test_slide2.svg', $res->json('data.0.image_url'));
    }
}
