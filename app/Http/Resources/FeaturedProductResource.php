<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FeaturedProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'position' => $this->position,
            'product' => [
                'id' => $this->product->id ?? null,
                'title' => $this->product->title ?? null,
                'price' => $this->product->price ?? null,
            ]
        ];
    }
}
