<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'mitra_id' => 'required|exists:mitras,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'is_active' => 'boolean',
            // allow same image types as slides (jpg, png, gif, svg, webp)
            'image' => 'nullable|file|mimes:jpeg,jpg,png,gif,svg,webp|max:5120',
        ];
    }
}
