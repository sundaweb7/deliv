<?php

namespace App\Http\Controllers\AdminUI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DeviceToken;

class NotificationController extends AdminBaseController
{
    public function index(Request $request)
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        return view('admin.notifications.index');
    }

    public function send(Request $request)
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;

        $data = $request->validate([
            'title' => 'required|string|max:200',
            'body' => 'required|string|max:500',
            'target' => 'required|in:all,customers,mitras,drivers,manual',
            'manual_tokens' => 'nullable|string'
        ]);

        $tokens = [];
        if ($data['target'] === 'manual') {
            $manual = trim($request->input('manual_tokens',''));
            if ($manual) {
                $tokens = array_values(array_filter(array_map('trim', preg_split('/[\s,;]+/', $manual))));
            }
        } else {
            $query = DeviceToken::query();
            if ($data['target'] === 'customers') {
                $query->whereHas('user', function($q){ $q->where('role','customer'); });
            } elseif ($data['target'] === 'mitras') {
                $query->whereHas('user', function($q){ $q->where('role','mitra'); });
            } elseif ($data['target'] === 'drivers') {
                $query->whereHas('user', function($q){ $q->where('role','driver'); });
            }
            $tokens = $query->pluck('token')->filter()->unique()->values()->all();
        }

        $sent = 0;
        if (!empty($tokens)) {
            // resolve via container so tests can mock FcmService
            $fcm = app(\App\Services\FcmService::class);
            $ok = $fcm->sendToTokens($tokens, $data['title'], $data['body']);
            if ($ok) $sent = count($tokens);
        }

        return redirect()->route('admin.notifications.index')->with('success', "Notification sent to {$sent} tokens");
    }
}
