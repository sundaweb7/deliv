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
        $user = User::create([
            'name' => $data['name'], 'email' => $data['email'], 'phone' => $data['phone'] ?? null, 'password' => \Illuminate\Support\Facades\Hash::make($data['password'] ?? 'password'), 'role' => 'mitra'
        ]);
        $mitra = Mitra::create(['user_id' => $user->id, 'delivery_type' => $data['delivery_type'] ?? 'anyerdeliv', 'lat' => $data['lat'] ?? null, 'lng' => $data['lng'] ?? null, 'is_active' => $data['is_active'] ?? true]);
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
        $mitra->user->update(array_filter(['name'=>$data['name'] ?? null, 'email'=>$data['email'] ?? null, 'phone'=>$data['phone'] ?? null]));
        $mitra->update(['delivery_type'=>$data['delivery_type'] ?? $mitra->delivery_type, 'lat'=>$data['lat'] ?? $mitra->lat, 'lng'=>$data['lng'] ?? $mitra->lng, 'is_active'=>$data['is_active'] ?? $mitra->is_active]);
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
