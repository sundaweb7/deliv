<?php

namespace App\Http\Controllers\AdminUI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MitraStatusLogController extends Controller
{
    public function index(Request $request)
    {
        if (!session('admin_token')) return redirect()->route('admin.login');
        $resp = app(\App\Http\Controllers\Admin\MitraStatusLogController::class)->index($request);
        $data = $resp instanceof \Illuminate\Http\JsonResponse ? $resp->getData(true)['data'] ?? [] : [];
        $meta = $resp instanceof \Illuminate\Http\JsonResponse ? $resp->getData(true)['meta']['pagination'] ?? [] : [];
        return view('admin.mitra_logs.index', ['logs' => $data, 'meta' => $meta]);
    }
}
