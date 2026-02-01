<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MitraShippingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:191',
            'description' => 'nullable|string',
            'is_active' => 'sometimes|boolean',
            'rates' => 'nullable|array',
            'rates.*.destination' => 'required_with:rates|string',
            'rates.*.cost' => 'required_with:rates|integer|min:0',
            'rates.*.is_active' => 'sometimes|boolean'
        ];
    }
}
