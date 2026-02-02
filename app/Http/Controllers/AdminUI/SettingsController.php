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
            'fcm_server_key' => 'nullable|string',
            'wa_provider' => 'nullable|string|in:fontee,none',
            'wa_api_key' => 'nullable|string',
            'wa_device_id' => 'nullable|string',
            'wa_api_url' => 'nullable|url',
            'wa_enabled' => 'nullable|boolean',
            'wa_send_to_mitra' => 'nullable|boolean',
            'wa_send_to_customer' => 'nullable|boolean',
        ]);
        $settings = Setting::first();

        // normalize checkboxes (they won't be present when unchecked)
        $data['wa_enabled'] = $request->has('wa_enabled') ? 1 : 0;
        $data['wa_send_to_mitra'] = $request->has('wa_send_to_mitra') ? 1 : 0;
        $data['wa_send_to_customer'] = $request->has('wa_send_to_customer') ? 1 : 0;

        $settings->update($data);
        return redirect()->route('admin.settings.edit')->with('success','Settings updated');
    }
}
