<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Mitra;

class ProductDummySeeder extends Seeder
{
    public function run()
    {
        Storage::disk('public')->makeDirectory('products/originals');
        Storage::disk('public')->makeDirectory('products/thumb');

        // Ensure there is at least one mitra to assign products to
        $mitraUser = User::where('role', 'mitra')->first();
        if (!$mitraUser) {
            $mitraUser = User::factory()->create(['role' => 'mitra', 'email' => 'mitra@sample.test']);
        }
        $mitra = Mitra::firstOrCreate(['user_id' => $mitraUser->id], ['delivery_type' => 'self_delivery', 'is_active' => 1]);

        $categories = Category::all();
        foreach ($categories as $cat) {
            for ($i = 1; $i <= 10; $i++) {
                $slug = preg_replace('/[^a-z0-9]+/','-',strtolower($cat->name));
                $filename = "product_{$slug}_{$i}.svg";
                $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="400" height="400">'
                      . '<rect width="100%" height="100%" fill="' . $this->colorFor($i) . '"/>'
                      . '<text x="50%" y="50%" fill="#ffffff" font-size="20" text-anchor="middle" dominant-baseline="middle">'
                      . htmlentities($cat->name . ' Product ' . $i)
                      . '</text></svg>';
                Storage::disk('public')->put('products/originals/' . $filename, $svg);

                // generate thumb from original
                try { \App\Services\ProductImageService::ensureThumb($filename); } catch (\Throwable $e) { }

                $data = [
                    'name' => $cat->name . ' Product ' . $i,
                    'price' => rand(5000, 50000),
                    'stock' => rand(10, 100),
                    'mitra_id' => $mitra->id,
                    'category_id' => $cat->id,
                    'is_active' => 1,
                ];
                // add image if column exists
                if (\Illuminate\Support\Facades\Schema::hasColumn('products', 'image')) {
                    $data['image'] = $filename;
                }
                // add description if column exists
                if (\Illuminate\Support\Facades\Schema::hasColumn('products', 'description')) {
                    $data['description'] = 'Produk contoh untuk kategori ' . $cat->name;
                }

                Product::create($data);
            }
        }
    }

    protected function colorFor($i)
    {
        $colors = ['#0ea5a4','#6366f1','#ef4444','#f97316','#f59e0b','#84cc16','#06b6d4','#8b5cf6','#ec4899','#10b981'];
        return $colors[($i-1) % count($colors)];
    }
}
