<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MitraCourier;

class CourierController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $mitra = $user->mitra;
        if (!$mitra) return redirect('/');
        // include both direct couriers and attached couriers
        $couriers = $mitra->couriers()->get()->merge($mitra->couriersMany()->get());
        return view('mitra.couriers.index', ['mitra' => $mitra, 'couriers' => $couriers]);
    }

    public function store(Request $request)
    {
        $user = $request->user();
        $mitra = $user->mitra;
        $data = $request->validate(['name'=>'required|string','phone'=>'required|string','vehicle'=>'nullable|string','is_active'=>'nullable|boolean']);
        $data['is_active'] = $request->input('is_active', true);
        $mitra->couriers()->create($data);
        return redirect()->route('mitra.couriers.index')->with('success','Courier added');
    }

    public function update(Request $request, $id)
    {
        $user = $request->user();
        $mitra = $user->mitra;
        $courier = MitraCourier::where('mitra_id',$mitra->id)->where('id',$id)->firstOrFail();
        $data = $request->validate(['name'=>'sometimes|required|string','phone'=>'sometimes|required|string','vehicle'=>'nullable|string','is_active'=>'nullable|boolean']);
        $courier->update($data);
        return redirect()->route('mitra.couriers.index')->with('success','Courier updated');
    }

    public function destroy(Request $request, $id)
    {
        $user = $request->user();
        $mitra = $user->mitra;
        $courier = MitraCourier::where('mitra_id',$mitra->id)->where('id',$id)->firstOrFail();
        $courier->delete();
        return redirect()->route('mitra.couriers.index')->with('success','Courier deleted');
    }
}