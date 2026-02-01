<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderVendorResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'mitra' => $this->mitra,
            'subtotal_food' => $this->subtotal_food,
            'delivery_type' => $this->delivery_type,
            'status' => $this->status,
            'items' => $this->items,
        ];
    }
}
