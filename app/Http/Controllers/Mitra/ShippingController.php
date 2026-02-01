<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MitraShipping;
use App\Models\MitraShippingRate;
use App\Http\Requests\MitraShippingRequest;

class ShippingController extends Controller
{
    public function index(Request $request)
    {
        $mitra = $request->user()->mitra;
        $models = MitraShipping::with('rates')->where('mitra_id', $mitra->id)->get();
        return response()->json(['success' => true, 'message' => 'Shipping models', 'data' => $models]);
    }

    public function store(MitraShippingRequest $request)
    {
        $mitra = $request->user()->mitra;
        $data = $request->validated();
        $data['mitra_id'] = $mitra->id;
        $model = MitraShipping::create($data);
        // rates optional
        if ($request->has('rates') && is_array($request->rates)) {
            foreach ($request->rates as $r) {
                $model->rates()->create(['destination'=>$r['destination'],'cost'=>$r['cost'],'is_active'=>($r['is_active'] ?? true)]);
            }
        }
        return response()->json(['success' => true, 'message' => 'Created', 'data' => $model->load('rates')]);
    }

    public function show(Request $request, $id)
    {
        $mitra = $request->user()->mitra;
        $model = MitraShipping::with('rates')->where('mitra_id', $mitra->id)->findOrFail($id);
        return response()->json(['success' => true, 'message' => 'Detail', 'data' => $model]);
    }

    // UI helpers
    public function create(Request $request)
    {
        return view('mitra.shippings.create');
    }

    public function edit(Request $request, $id)
    {
        $resp = $this->show($request, $id);
        $data = $resp instanceof \Illuminate\Http\JsonResponse ? $resp->getData(true)['data'] ?? [] : [];
        return view('mitra.shippings.edit', ['model' => $data]);
    }

    public function update(MitraShippingRequest $request, $id)
    {
        $mitra = $request->user()->mitra;
        $model = MitraShipping::where('mitra_id', $mitra->id)->findOrFail($id);
        $model->update($request->validated());
        // optional rates payload to replace rates if provided
        if ($request->has('rates') && is_array($request->rates)) {
            // naive replace: delete and recreate
            $model->rates()->delete();
            foreach ($request->rates as $r) {
                $model->rates()->create(['destination'=>$r['destination'],'cost'=>$r['cost'],'is_active'=>($r['is_active'] ?? true)]);
            }
        }
        return response()->json(['success' => true, 'message' => 'Updated', 'data' => $model->fresh()->load('rates')]);
    }

    public function destroy(Request $request, $id)
    {
        $mitra = $request->user()->mitra;
        $model = MitraShipping::where('mitra_id', $mitra->id)->findOrFail($id);
        $model->delete();
        return response()->json(['success' => true, 'message' => 'Deleted']);
    }
}