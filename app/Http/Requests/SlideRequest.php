<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlideRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'order' => 'nullable|integer',
            'is_active' => 'sometimes|boolean'
        ];

        if ($this->isMethod('post')) {
            // accept common image types (jpg/jpeg/png/gif/svg/webp) and enforce max size
            $rules['image'] = 'required|image|mimes:jpg,jpeg,png,gif,svg,webp|max:2048';
        } else {
            $rules['image'] = 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp|max:2048';
        }

        return $rules;
    }
}
