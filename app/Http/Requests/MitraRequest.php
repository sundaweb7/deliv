<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MitraRequest extends FormRequest
{
    public function authorize()
    {
        // Only allow admin
        return $this->user() && $this->user()->role === 'admin';
    }

    public function rules()
    {
        $rules = [
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:users,email,' . ($this->route('mitra') ?? 'NULL'),
            'phone' => 'nullable|string',
            'delivery_type' => 'nullable|in:app_driver,delivery_kurir,gojek',
            'lat' => 'nullable|numeric',
            'lng' => 'nullable|numeric',
            'is_active' => 'nullable|boolean',

            // profile fields
            'business_name' => 'nullable|string|max:255',
            'wa_number' => 'nullable|string|max:50',
            'address_desa' => 'nullable|string|max:255',
            'address_kecamatan' => 'nullable|string|max:255',
            'address_regency' => 'nullable|string|max:255',
            'address_province' => 'nullable|string|max:255',
            'profile_photo' => 'nullable|string'
        ];

        // On create also require name and email
        if ($this->isMethod('post')) {
            $rules['name'] = 'required|string|max:255';
            $rules['email'] = 'required|email|unique:users,email';
            $rules['password'] = 'nullable|string|min:6';
        }

        return $rules;
    }
}
