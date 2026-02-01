<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Database\Seeders\ProductDummySeeder;
use App\Models\Category;

class ProductDummySeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_products_and_images_created_for_each_category()
    {
        // seed categories
        $this->seed(\Database\Seeders\CategorySeeder::class);

        // run product dummy seeder
        $this->seed(ProductDummySeeder::class);

        $categories = Category::all();
        $this->assertGreaterThan(0, $categories->count());

        foreach ($categories as $cat) {
            $prods = \App\Models\Product::where('category_id', $cat->id)->get();
            $this->assertCount(10, $prods, "Kategori {$cat->name} harus punya 10 produk");
            foreach ($prods as $p) {
                if (\Illuminate\Support\Facades\Schema::hasColumn('products', 'image')) {
                    $this->assertNotNull($p->image);
                    Storage::disk('public')->assertExists('products/originals/' . $p->image);
                } else {
                    $this->assertTrue(true); // image column not present in this schema
                }
            }
        }
    }
}
