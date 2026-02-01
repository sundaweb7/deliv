<?php

namespace App\Http\Controllers\AdminUI;

use App\Http\Controllers\AdminUI\AdminBaseController;
use Illuminate\Http\Request;
use App\Models\Driver;

class DriverController extends AdminBaseController
{
    public function index(Request $request)
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        $drivers = Driver::with('user')->paginate(15);
        return view('admin.drivers.index', ['drivers' => $drivers]);
    }

    public function toggleOnline($id)
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        $driver = Driver::findOrFail($id);
        $driver->is_online = !$driver->is_online;
        $driver->save();
        return redirect()->route('admin.drivers.index')->with('success','Driver status toggled');
    }

    public function destroy($id)
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        $driver = Driver::findOrFail($id);
        if ($driver->user) $driver->user->delete();
        $driver->delete();
        return redirect()->route('admin.drivers.index')->with('success','Driver deleted');
    }
}
