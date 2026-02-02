<?php

namespace App\Http\Controllers\MitraUI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        $user = $request->user();
        if (!$user || !$user->mitra) return redirect()->route('login');
        return view('mitra.profile', ['user' => $user, 'mitra' => $user->mitra]);
    }

    public function update(Request $request)
    {
        $user = $request->user();
        if (!$user || !$user->mitra) return redirect()->route('login');

        $data = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'business_name' => 'nullable|string|max:255',
            'wa_number' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:1000',
            'address_desa' => 'nullable|string|max:255',
            'address_kecamatan' => 'nullable|string|max:255',
            'address_regency' => 'nullable|string|max:255',
            'address_province' => 'nullable|string|max:255',
            'profile_photo' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:5120',
            'store_photo' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:5120',
        ]);

        // update user
        $user->update(array_filter([ 'name' => $data['name'] ?? null, 'email' => $data['email'] ?? null, 'phone' => $data['phone'] ?? null ]));

        // handle profile photo
        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');
            $filename = time() . '_' . preg_replace('/[^a-z0-9\.\-]+/i','_', $file->getClientOriginalName());
            $file->storeAs('mitra-photos', $filename, 'public');
            $data['profile_photo'] = $filename;
        }

        // handle store photo
        if ($request->hasFile('store_photo')) {
            $file = $request->file('store_photo');
            $filename = time() . '_store_' . preg_replace('/[^a-z0-9\.\-]+/i','_', $file->getClientOriginalName());
            $file->storeAs('mitra-store-photos', $filename, 'public');
            $data['store_photo'] = $filename;
        }

        $user->mitra->update([
            'business_name' => $data['business_name'] ?? $user->mitra->business_name,
            'wa_number' => $data['wa_number'] ?? $user->mitra->wa_number,
            'address' => $data['address'] ?? $user->mitra->address,
            'address_desa' => $data['address_desa'] ?? $user->mitra->address_desa,
            'address_kecamatan' => $data['address_kecamatan'] ?? $user->mitra->address_kecamatan,
            'address_regency' => $data['address_regency'] ?? $user->mitra->address_regency,
            'address_province' => $data['address_province'] ?? $user->mitra->address_province,
            'profile_photo' => $data['profile_photo'] ?? $user->mitra->profile_photo,
            'store_photo' => $data['store_photo'] ?? $user->mitra->store_photo,
        ]);

        return redirect()->route('mitra.profile')->with('success','Profile updated');
    }
}