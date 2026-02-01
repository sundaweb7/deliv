<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;

class MitraProductEditViewTest extends TestCase
{
    public function test_mitra_product_edit_view_renders()
    {
        $product = (object)['id'=>1,'name'=>'Test','price'=>12345,'stock'=>5,'description'=>null,'image'=>null,'thumb_url'=>null];
        $errors = new \Illuminate\Support\ViewErrorBag();
        $html = view('mitra.products.edit', ['product' => $product, 'errors' => $errors])->render();
        $this->assertStringContainsString('Edit Product', $html);
        $this->assertStringContainsString('Test', $html);
    }
}
