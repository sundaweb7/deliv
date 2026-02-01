<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Mitra;

class AdminProductEditViewTest extends TestCase
{
    public function test_admin_product_edit_view_renders()
    {
        $mitra = (object)['id' => 1, 'user' => (object)['name' => 'Mitra 1']];
        $product = (object)['id'=>1,'mitra_id'=>1,'name'=>'X','price'=>100,'stock'=>10,'image'=>null,'thumb_url'=>null,'description'=>null];

        $errors = new \Illuminate\Support\ViewErrorBag();
        $html = view('admin.products.edit', ['product'=>$product, 'mitras'=>collect([$mitra]), 'errors' => $errors])->render();
        $this->assertStringContainsString('Edit Product', $html);
        $this->assertStringContainsString('X', $html);
    }
}
