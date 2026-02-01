<?php

namespace App\Http\Controllers\AdminUI;

use App\Http\Controllers\AdminUI\AdminBaseController;
use Illuminate\Http\Request;
use App\Models\Mitra;
use App\Models\MitraCourier;

class MitraCourierController extends AdminBaseController
{
    public function index($mitraId)
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        $mitra = Mitra::with('couriers')->findOrFail($mitraId);
        return view('admin.mitras.couriers.index', ['mitra' => $mitra, 'couriers' => $mitra->couriers]);
    }

    public function store(Request $request, $mitraId)
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        $mitra = Mitra::findOrFail($mitraId);
        $data = $request->validate(['name'=>'required|string','phone'=>'required|string','vehicle'=>'nullable|string','is_active'=>'nullable|boolean']);
        $data['is_active'] = $request->input('is_active', true);
        $mitra->couriers()->create($data);
        return redirect()->route('admin.mitras.couriers', ['mitra'=>$mitraId])->with('success','Courier added');
    }

    public function toggle($mitraId, $id)
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        $courier = MitraCourier::where('mitra_id', $mitraId)->where('id', $id)->firstOrFail();
        $courier->is_active = !$courier->is_active;
        $courier->save();
        return redirect()->back()->with('success','Courier toggled');
    }

    public function destroy($mitraId, $id)
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        $courier = MitraCourier::where('mitra_id', $mitraId)->where('id', $id)->firstOrFail();
        $courier->delete();
        return redirect()->back()->with('success','Courier deleted');
    }
}