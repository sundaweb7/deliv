<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'customer_id' => $this->customer_id,
            'order_type' => $this->order_type,
            'status' => $this->status,
            'total_food' => $this->total_food,
            'delivery_fee' => $this->delivery_fee,
            'admin_profit' => $this->admin_profit,
            'grand_total' => $this->grand_total,
            'vendors' => OrderVendorResource::collection($this->whenLoaded('orderVendors')),
            'created_at' => $this->created_at,
        ];
    }
}
