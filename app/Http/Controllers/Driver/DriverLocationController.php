<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DriverLocation;
use Illuminate\Support\Facades\Cache;
use App\Events\DriverLocationUpdated;

class DriverLocationController extends Controller
{
    public function report(Request $request)
    {
        $request->validate([
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'speed' => 'nullable|numeric',
            'heading' => 'nullable|numeric',
            'reported_at' => 'nullable|date',
        ]);

        $driver = $request->user()->driver;
        if (!$driver) return response()->json(['success'=>false,'message'=>'Driver not found'], 404);

        $data = $request->only(['lat','lng','speed','heading','reported_at']);
        $data['driver_id'] = $driver->id;
        $data['reported_at'] = $data['reported_at'] ?? now();

        $loc = DriverLocation::create($data);

        // cache latest location (for fast reads)
        Cache::put('driver:loc:' . $driver->id, ['lat'=>$data['lat'],'lng'=>$data['lng'],'speed'=>$data['speed'],'heading'=>$data['heading'],'reported_at'=>$data['reported_at']], 300);

        // broadcast event
        event(new DriverLocationUpdated($driver->id, $data['lat'], $data['lng'], $data['speed'] ?? null, $data['heading'] ?? null, $data['reported_at']));

        return response()->json(['success'=>true,'message'=>'Location reported']);
    }
}