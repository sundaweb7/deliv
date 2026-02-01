<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Slide;

class SlidesApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_slides_return_active_only()
    {
        Slide::create(['image' => null, 'order' => 1, 'is_active' => true]);
        Slide::create(['image' => null, 'order' => 2, 'is_active' => false]);

        $res = $this->getJson('/api/slides');
        $res->assertStatus(200);
        $res->assertJsonPath('data.0.is_active', true);
        $this->assertCount(1, $res->json('data'));
    }
}
