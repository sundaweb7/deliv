<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SlideResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'image_url' => $this->image_url,
            'thumb_url' => $this->thumb_url,
            'order' => $this->order,
            'is_active' => (bool) $this->is_active,
        ];
    }
}
