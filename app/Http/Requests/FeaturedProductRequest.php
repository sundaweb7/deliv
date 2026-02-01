<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeaturedProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'product_id' => 'required|exists:products,id',
            'position' => 'required|integer|min:1|max:10'
        ];
    }
}
