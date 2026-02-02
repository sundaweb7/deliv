<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'address' => 'required|string',
            'note' => 'nullable|string',
            'payment_method' => 'nullable|in:wallet,bank_transfer,cod',
            'bank_id' => 'nullable|exists:banks,id',
            // delivery_option: pickup = ambil sendiri, mitra = kurir mitra, admin = kurir dari admin (anyerdeliv)
            'delivery_option' => 'nullable|in:pickup,mitra,admin',
            'mitra_shipping' => 'nullable|array',
            'mitra_shipping.*' => 'nullable|integer'
        ];
    }
}
