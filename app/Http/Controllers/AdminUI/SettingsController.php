<?php

namespace App\Http\Controllers\AdminUI;

use App\Http\Controllers\AdminUI\AdminBaseController;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingsController extends AdminBaseController
{
    public function edit()
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        $settings = Setting::first();
        return view('admin.settings.edit', ['settings' => $settings]);
    }

    public function update(Request $request)
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        $data = $request->validate([
            'vendor_commission_percent' => 'required|numeric|min:0|max:100',
            'admin_delivery_cut' => 'required|numeric|min:0',
            'courier_share_percent' => 'nullable|numeric|min:0|max:100',
        ]);
        $settings = Setting::first();
        $settings->update($data);
        return redirect()->route('admin.settings.edit')->with('success','Settings updated');
    }
}
