<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MitraCourierRequest extends FormRequest
{
    public function authorize(): bool
    {
        // logic: mitra must be authenticated user; controllers will ensure
        return true;
    }

    public function rules(): array
    {
        // Allow partial updates on PUT/PATCH by using sometimes
        if ($this->isMethod('post')) {
            return [
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:32',
                'vehicle' => 'nullable|string|max:255',
                'is_active' => 'nullable|boolean',
            ];
        }

        return [
            'name' => 'sometimes|required|string|max:255',
            'phone' => 'sometimes|required|string|max:32',
            'vehicle' => 'nullable|string|max:255',
            'is_active' => 'nullable|boolean',
        ];
    }
}