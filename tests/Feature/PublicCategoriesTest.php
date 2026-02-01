<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Category;

class PublicCategoriesTest extends TestCase
{
    use RefreshDatabase;

    public function test_categories_publicly_listed()
    {
        $this->seed(\Database\Seeders\CategorySeeder::class);
        $res = $this->getJson('/api/categories');
        $res->assertStatus(200);
        $res->assertJsonFragment(['name' => 'Makanan']);
        $res->assertJsonFragment(['name' => 'Minuman']);
    }
}
