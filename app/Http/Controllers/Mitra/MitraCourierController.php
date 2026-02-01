<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MitraCourier;
use App\Http\Requests\MitraCourierRequest;

class MitraCourierController extends Controller
{
    public function index(Request $request)
    {
        $mitra = $request->user()->mitra;
        $couriers = $mitra->couriers()->get();
        return response()->json(['success'=>true,'message'=>'List couriers','data'=>$couriers]);
    }

    public function store(MitraCourierRequest $request)
    {
        $mitra = $request->user()->mitra;
        $data = $request->validated();
        $data['is_active'] = $request->input('is_active', true);
        $courier = $mitra->couriers()->create($data);
        return response()->json(['success'=>true,'message'=>'Courier created','data'=>$courier]);
    }

    public function update(MitraCourierRequest $request, $id)
    {
        $mitra = $request->user()->mitra;
        $courier = $mita = MitraCourier::where('mitra_id',$mitra->id)->where('id',$id)->firstOrFail();
        $courier->update($request->validated());
        return response()->json(['success'=>true,'message'=>'Courier updated','data'=>$courier]);
    }

    public function destroy(Request $request, $id)
    {
        $mitra = $request->user()->mitra;
        $courier = MitraCourier::where('mitra_id',$mitra->id)->where('id',$id)->firstOrFail();
        $courier->delete();
        return response()->json(['success'=>true,'message'=>'Courier deleted']);
    }
}