<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;

class ProductApiThumbTest extends TestCase
{
    public function test_product_model_appends_thumb_url()
    {
        $p = new Product(['id'=>123,'name'=>'X','image'=>'product_makanan_1.svg']);
        $arr = $p->toArray();
        $this->assertArrayHasKey('image_url', $arr);
        $this->assertArrayHasKey('thumb_url', $arr);
        $this->assertStringContainsString('/products/image/thumb/', $arr['thumb_url']);
    }
}
