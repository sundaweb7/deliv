<?php

namespace App\Http\Controllers\AdminUI;

use App\Http\Controllers\AdminUI\AdminBaseController;
use Illuminate\Http\Request;
use App\Models\WhatsappLog;

class WhatsappLogController extends AdminBaseController
{
    public function index(Request $request, $orderId = null)
    {
        if ($r = $this->ensureAdmin()) return $r;
        $q = WhatsappLog::orderBy('created_at', 'desc');
        if ($orderId) $q->where('order_id', $orderId);
        if ($request->has('success')) $q->where('success', $request->success ? 1 : 0);
        $logs = $q->paginate(50);
        return view('admin.wa_logs.index', ['logs' => $logs, 'orderId' => $orderId]);
    }

    public function resend(Request $request, WhatsappLog $log)
    {
        if ($r = $this->ensureAdmin()) return $r;
        $wa = new \App\Services\WhatsappService();
        $res = $wa->sendTextRaw($log->target, $log->message);
        $log->update(['attempts' => $log->attempts + 1, 'success' => $res['success'] ?? false, 'response' => isset($res['body']) ? (is_string($res['body']) ? $res['body'] : json_encode($res['body'])) : json_encode($res)]);
        return redirect()->back()->with('success', $res['success'] ? 'Resend successful' : 'Resend failed: ' . ($res['message'] ?? ($res['body'] ?? 'error')));
    }
}
