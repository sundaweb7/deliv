<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileApiController extends Controller
{
    public function update(Request $request)
    {
        $user = $request->user();
        if (!$user || !$user->mitra) return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);

        $data = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'phone' => 'nullable|string|max:50',
            'business_name' => 'nullable|string|max:255',
            'wa_number' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:1000',
            'address_desa' => 'nullable|string|max:255',
            'address_kecamatan' => 'nullable|string|max:255',
            'address_regency' => 'nullable|string|max:255',
            'address_province' => 'nullable|string|max:255',
        ]);

        // update user fields (normalize phone)
        $phone = $data['phone'] ?? null;
        if ($phone) { $phone = \App\Services\PhoneHelper::normalizeIndoPhone($phone); }
        $user->update(array_filter([ 'name' => $data['name'] ?? null, 'phone' => $phone ?? null ]));

        // update mitra fields (normalize wa number)
        $wa = $data['wa_number'] ?? null;
        if ($wa) { $wa = \App\Services\PhoneHelper::normalizeIndoPhone($wa); }
        $user->mitra->update([
            'business_name' => $data['business_name'] ?? $user->mitra->business_name,
            'wa_number' => $wa ?? $user->mitra->wa_number,
            'address' => $data['address'] ?? $user->mitra->address,
            'address_desa' => $data['address_desa'] ?? $user->mitra->address_desa,
            'address_kecamatan' => $data['address_kecamatan'] ?? $user->mitra->address_kecamatan,
            'address_regency' => $data['address_regency'] ?? $user->mitra->address_regency,
            'address_province' => $data['address_province'] ?? $user->mitra->address_province,
        ]);

        // return fresh user with mitra and counts
        $user->load('mitra');
        if ($user->mitra) {
            $mitra = $user->mitra;
            $mitra->products_count = $mitra->products()->count();
            $mitra->sales_count = \App\Models\OrderVendor::where('mitra_id', $mitra->id)->where('status', 'delivered')->count();
            $mitra->transactions_count = \App\Models\Transaction::whereHas('wallet', function($q) use ($user) { $q->where('user_id', $user->id); })->count();
            $user->mitra = $mitra;
        }

        return response()->json(['success' => true, 'message' => 'Profile updated', 'data' => $user]);
    }
}
