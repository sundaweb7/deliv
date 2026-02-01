<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VoucherResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'type' => $this->type,
            'value' => (float) $this->value,
            'usage_limit' => $this->usage_limit,
            'used_count' => $this->used_count,
            'min_order_amount' => (float) $this->min_order_amount,
            'starts_at' => $this->starts_at,
            'expires_at' => $this->expires_at,
            'is_active' => (bool) $this->is_active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
