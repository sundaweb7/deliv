<?php

namespace App\Http\Controllers\AdminUI;

use App\Http\Controllers\AdminUI\AdminBaseController;
use Illuminate\Http\Request;
use App\Models\Mitra;
use App\Models\User;
use App\Http\Requests\MitraRequest;

class MitraController extends AdminBaseController
{
    public function index(Request $request)
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;

        $query = Mitra::with('user');
        if ($request->has('is_active')) {
            $query->where('is_active', $request->is_active);
        }
        $mitras = $query->paginate(15);
        return view('admin.mitras.index', ['mitras' => $mitras]);
    }

    public function create()
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        return view('admin.mitras.create');
    }

    public function store(MitraRequest $request)
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        $data = $request->validated();

        // handle profile and store photo uploads from admin UI
        if ($request->hasFile('profile_photo')) {
            $f = $request->file('profile_photo');
            $fn = time() . '_' . preg_replace('/[^a-z0-9\.\-]+/i','_', $f->getClientOriginalName());
            $f->storeAs('mitra-photos', $fn, 'public');
            $data['profile_photo'] = $fn;
        }
        if ($request->hasFile('store_photo')) {
            $f = $request->file('store_photo');
            $fn = time() . '_store_' . preg_replace('/[^a-z0-9\.\-]+/i','_', $f->getClientOriginalName());
            $f->storeAs('mitra-store-photos', $fn, 'public');
            $data['store_photo'] = $fn;
        }

        $user = User::create([
            'name' => $data['name'], 'email' => $data['email'], 'phone' => $data['phone'] ?? null, 'password' => \Illuminate\Support\Facades\Hash::make($data['password'] ?? 'password'), 'role' => 'mitra'
        ]);
        $mitra = Mitra::create(['user_id' => $user->id, 'delivery_type' => $data['delivery_type'] ?? 'anyerdeliv', 'lat' => $data['lat'] ?? null, 'lng' => $data['lng'] ?? null, 'is_active' => $data['is_active'] ?? true, 'business_name' => $data['business_name'] ?? null, 'wa_number' => $data['wa_number'] ?? null, 'address' => $data['address'] ?? null, 'address_desa' => $data['address_desa'] ?? null, 'address_kecamatan' => $data['address_kecamatan'] ?? null, 'address_regency' => $data['address_regency'] ?? null, 'address_province' => $data['address_province'] ?? null, 'profile_photo' => $data['profile_photo'] ?? null, 'store_photo' => $data['store_photo'] ?? null]);
        return redirect()->route('admin.mitras.index')->with('success', 'Mitra created');
    }

    public function edit($id)
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        $mitra = Mitra::with('user')->findOrFail($id);
        return view('admin.mitras.edit', ['mitra' => $mitra]);
    }

    public function update(MitraRequest $request, $id)
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        $mitra = Mitra::with('user')->findOrFail($id);
        $data = $request->validated();

        // handle uploads
        if ($request->hasFile('profile_photo')) {
            $f = $request->file('profile_photo');
            $fn = time() . '_' . preg_replace('/[^a-z0-9\.\-]+/i','_', $f->getClientOriginalName());
            $f->storeAs('mitra-photos', $fn, 'public');
            $data['profile_photo'] = $fn;
        }
        if ($request->hasFile('store_photo')) {
            $f = $request->file('store_photo');
            $fn = time() . '_store_' . preg_replace('/[^a-z0-9\.\-]+/i','_', $f->getClientOriginalName());
            $f->storeAs('mitra-store-photos', $fn, 'public');
            $data['store_photo'] = $fn;
        }

        $mitra->user->update(array_filter(['name'=>$data['name'] ?? null, 'email'=>$data['email'] ?? null, 'phone'=>$data['phone'] ?? null]));
        $mitra->update(['delivery_type'=>$data['delivery_type'] ?? $mitra->delivery_type, 'lat'=>$data['lat'] ?? $mitra->lat, 'lng'=>$data['lng'] ?? $mitra->lng, 'is_active'=>$data['is_active'] ?? $mitra->is_active, 'business_name' => $data['business_name'] ?? $mitra->business_name, 'wa_number' => $data['wa_number'] ?? $mitra->wa_number, 'address' => $data['address'] ?? $mitra->address, 'address_desa' => $data['address_desa'] ?? $mitra->address_desa, 'address_kecamatan' => $data['address_kecamatan'] ?? $mitra->address_kecamatan, 'address_regency' => $data['address_regency'] ?? $mitra->address_regency, 'address_province' => $data['address_province'] ?? $mitra->address_province, 'profile_photo' => $data['profile_photo'] ?? $mitra->profile_photo, 'store_photo' => $data['store_photo'] ?? $mitra->store_photo ]);
        return redirect()->route('admin.mitras.index')->with('success','Mitra updated');
    }

    public function destroy($id)
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        $mitra = Mitra::findOrFail($id);
        // delete user as well
        if ($mitra->user) $mitra->user->delete();
        $mitra->delete();
        return redirect()->route('admin.mitras.index')->with('success','Mitra deleted');
    }

    public function toggle($id)
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        $mitra = Mitra::findOrFail($id);
        $mitra->is_active = !$mitra->is_active;
        $mitra->save();
        return redirect()->route('admin.mitras.index')->with('success','Mitra status toggled');
    }
}
