<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Storage;

class ProductImageTest extends TestCase
{
    public function test_png_image_show_and_thumb()
    {
        Storage::fake('public');

        // small 1x1 PNG
        $pngBase64 = 'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR4nGNgYAAAAAMAASsJTYQAAAAASUVORK5CYII=';
        $pngData = base64_decode($pngBase64);

        Storage::disk('public')->put('products/originals/test.png', $pngData);

        // show
        $res = $this->get('/products/image/test.png');
        $res->assertStatus(200);
        $this->assertStringContainsString('image/png', $res->headers->get('Content-Type'));

        // thumb (should generate)
        $res2 = $this->get('/products/image/thumb/test.png');
        $res2->assertStatus(200);
        $this->assertStringContainsString('image/png', $res2->headers->get('Content-Type'));

        // Thumb file creation may depend on GD availability in the environment; ensure endpoint works (status + MIME).
        // If thumb file exists, assert it's non-empty for sanity.
        if (Storage::disk('public')->exists('products/thumb/test.png')) {
            $this->assertGreaterThan(0, Storage::disk('public')->size('products/thumb/test.png'));
        }
    }
}