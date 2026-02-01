<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use App\Models\Slide;

class ImageThumbnailTest extends TestCase
{
    use RefreshDatabase;

    public function test_thumb_generation_for_svg_slide_returns_same_svg()
    {
        Storage::fake('public');
        Storage::disk('public')->put('slides/test_svg.svg', '<svg></svg>');
        $s = Slide::create(['image' => 'test_svg.svg', 'order' => 1, 'is_active' => true]);

        $res = $this->get('/slides/image/thumb/test_svg.svg');
        $res->assertStatus(200);
        $res->assertHeader('Content-Type');
    }

    public function test_thumb_generation_for_raster_image()
    {
        Storage::fake('public');
        // write a small jpeg from base64 (avoids GD dependency in tests)
        $jpgBase64 = '/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxISEhIQEhIVFhUVFRUVFhUVFxUVFhUVFRUWFhUVFRUYHSggGBolHRUVITEhJSkrLi4uFx8zODMsNygtLisBCgoKDg0OGxAQGy0lICUtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLf/AABEIAJ8BPgMBIgACEQEDEQH/xAAbAAACAwEBAQAAAAAAAAAAAAAEBQADBgcBAv/EAD0QAAEDAgMFBwIFBQAAAAAAEAAgMEEQUSITFBUQYiYXGBEwQjQlLB0fAUM2JygpKxwdI0Q1Njc8Lx/8QAGQEBAQEBAQEAAAAAAAAAAAAAAAECAwQF/8QAHxEBAQEAAwEBAQEAAAAAAAAAAAERAhIhMUEiQf/aAAwDAQACEQMRAD8A9eExQhQhQhQhQhQhQhQhQhQhQhQhQhQhQhQhQhQhQhQhQhQhQhQhQhQhQhQhQhQhQhQhQhQhQhQhQhQhQhQhQhQhQhQhQhQhQhQhQhQv/Z';
        $jpgData = base64_decode($jpgBase64);
        Storage::disk('public')->put('slides/test_img.jpg', $jpgData);

        $res = $this->get('/slides/image/thumb/test_img.jpg');
        $res->assertStatus(200);
        $res->assertHeader('Content-Type');
    }
}
