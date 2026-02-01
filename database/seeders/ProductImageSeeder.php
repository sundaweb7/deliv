<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;

class ProductImageSeeder extends Seeder
{
    public function run()
    {
        Storage::disk('public')->makeDirectory('products/originals');
        Storage::disk('public')->makeDirectory('products/thumb');

        $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="400" height="400"><rect width="100%" height="100%" fill="#111827"/><text x="50%" y="50%" fill="#fff" font-size="24" text-anchor="middle" dominant-baseline="middle">Product</text></svg>';
        $name = 'product_sample.svg';
        Storage::disk('public')->put('products/originals/'.$name, $svg);
        try { \App\Services\ProductImageService::ensureThumb($name); } catch (\Throwable $e) { }

        // attach to some products if exist
        $p = Product::first();
        if ($p) {
            $p->image = $name;
            $p->save();
        }
    }
}
