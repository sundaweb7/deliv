<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:users,email',
            'phone' => 'required_without:email|string|unique:users,phone',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'in:customer,mitra,driver',
        ];
    }
}
