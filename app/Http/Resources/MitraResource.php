<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MitraResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => $this->whenLoaded('user', function () {
                return [
                    'id' => $this->user->id,
                    'name' => $this->user->name,
                    'email' => $this->user->email,
                    'phone' => $this->user->phone,
                ];
            }),
            'delivery_type' => $this->delivery_type,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'is_active' => (bool) $this->is_active,

            // profile info
            'business_name' => $this->business_name,
            'wa_number' => $this->wa_number,
            'address' => [
                'desa' => $this->address_desa,
                'kecamatan' => $this->address_kecamatan,
                'kabupaten' => $this->address_regency,
                'province' => $this->address_province,
            ],
            'profile_photo' => $this->profile_photo,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
