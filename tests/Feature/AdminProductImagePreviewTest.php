<?php

namespace Tests\Feature;

use Tests\TestCase;

class AdminProductImagePreviewTest extends TestCase
{
    public function test_admin_products_index_shows_thumb_url_images()
    {
        $product = (object)[
            'id' => 1,
            'name' => 'P1',
            'mitra' => (object)['user' => (object)['name' => 'Mitra 1']],
            'price' => 1000,
            'stock' => 10,
            'image' => 'product_makanan_1.svg',
            'thumb_url' => url('/products/image/thumb/product_makanan_1.svg')
        ];

        $items = collect([$product]);
        $paginator = new \Illuminate\Pagination\LengthAwarePaginator($items, $items->count(), 15, 1);
        $html = view('admin.products.index', ['products' => $paginator])->render();
        $this->assertStringContainsString('/products/image/thumb/product_makanan_1.svg', $html);
        $this->assertStringContainsString('<img', $html);
    }
}
