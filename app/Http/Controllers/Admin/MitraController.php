<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mitra;
use App\Http\Requests\MitraRequest;
use App\Http\Resources\MitraResource;

class MitraController extends Controller
{
    public function index(Request $request)
    {
        $query = Mitra::with('user');

        if ($request->has('is_active')) {
            $query->where('is_active', $request->is_active);
        }

        if ($request->has('delivery_type')) {
            $query->where('delivery_type', $request->delivery_type);
        }

        $mitras = $query->paginate(15);
        return response()->json(['success' => true, 'message' => 'Mitra list', 'data' => MitraResource::collection($mitras), 'meta' => ['pagination' => $mitras->toArray()]]);
    }

    public function store(MitraRequest $request)
    {
        $data = $request->validated();
        // create user first
        $user = \App\Models\User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'password' => \Illuminate\Support\Facades\Hash::make($data['password'] ?? 'password'),
            'role' => 'mitra'
        ]);

        $mitra = Mitra::create([
            'user_id' => $user->id,
            'delivery_type' => $data['delivery_type'] ?? 'app_driver',
            'lat' => $data['lat'] ?? null,
            'lng' => $data['lng'] ?? null,
            'is_active' => $data['is_active'] ?? true,
            'business_name' => $data['business_name'] ?? null,
            'wa_number' => $data['wa_number'] ?? null,
            'address_desa' => $data['address_desa'] ?? null,
            'address_kecamatan' => $data['address_kecamatan'] ?? null,
            'address_regency' => $data['address_regency'] ?? null,
            'address_province' => $data['address_province'] ?? null,
            'profile_photo' => $data['profile_photo'] ?? null,
        ]);

        return response()->json(['success' => true, 'message' => 'Mitra created', 'data' => new MitraResource($mitra->load('user'))]);
    }

    public function show($id)
    {
        $mitra = Mitra::with('user')->findOrFail($id);
        return response()->json(['success' => true, 'message' => 'Mitra detail', 'data' => new MitraResource($mitra)]);
    }

    public function update(MitraRequest $request, $id)
    {
        $mitra = Mitra::with('user')->findOrFail($id);
        $data = $request->validated();

        // update user
        if (isset($data['name']) || isset($data['email']) || isset($data['phone'])) {
            $mitra->user->update(array_filter([ 
                'name' => $data['name'] ?? null,
                'email' => $data['email'] ?? null,
                'phone' => $data['phone'] ?? null,
            ]));
        }

        $mitra->update([ 
            'delivery_type' => $data['delivery_type'] ?? $mitra->delivery_type,
            'lat' => $data['lat'] ?? $mitra->lat,
            'lng' => $data['lng'] ?? $mitra->lng,
            'is_active' => $data['is_active'] ?? $mitra->is_active,
            'business_name' => $data['business_name'] ?? $mitra->business_name,
            'wa_number' => $data['wa_number'] ?? $mitra->wa_number,
            'address_desa' => $data['address_desa'] ?? $mitra->address_desa,
            'address_kecamatan' => $data['address_kecamatan'] ?? $mitra->address_kecamatan,
            'address_regency' => $data['address_regency'] ?? $mitra->address_regency,
            'address_province' => $data['address_province'] ?? $mitra->address_province,
            'profile_photo' => $data['profile_photo'] ?? $mitra->profile_photo,
        ]);

        return response()->json(['success' => true, 'message' => 'Mitra updated', 'data' => new MitraResource($mitra->fresh('user'))]);
    }

    public function destroy($id)
    {
        $mitra = Mitra::findOrFail($id);
        $mitra->delete();
        return response()->json(['success' => true, 'message' => 'Mitra deleted']);
    }

    public function toggleActive(Request $request, $id)
    {
        $mitra = Mitra::findOrFail($id);
        $mitra->is_active = !$mitra->is_active;
        $mitra->save();
        return response()->json(['success' => true, 'message' => 'Mitra status updated', 'data' => new MitraResource($mitra->fresh('user'))]);
    }
}
