<?php

namespace App\Http\Controllers\AdminUI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function finance(Request $request)
    {
        // reuse API controller
        $resp = app(\App\Http\Controllers\Admin\ReportController::class)->finance($request);
        $data = $resp instanceof \Illuminate\Http\JsonResponse ? $resp->getData(true)['data'] ?? [] : [];
        return view('admin.reports.finance', ['data' => $data, 'from' => $request->from ?? null, 'to' => $request->to ?? null]);
    }
}