<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MitraRequest extends FormRequest
{
    public function authorize()
    {
        // Allow admin either via normal auth guard or via admin UI session
        $user = $this->user();
        if ($user && $user->role === 'admin') return true;

        // admin UI uses session values (admin_user_id)
        if ($this->session()->has('admin_user_id')) {
            $adminId = $this->session()->get('admin_user_id');
            $admin = \App\Models\User::find($adminId);
            if ($admin && $admin->role === 'admin') return true;
        }

        return false;
    }

    public function rules()
    {
        $rules = [
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:users,email,' . ($this->route('mitra') ?? 'NULL'),
            'phone' => 'nullable|string',
            'delivery_type' => 'nullable|in:anyerdeliv',
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
