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

        // Normalize daily rows into objects for view convenience
        if (isset($data['daily']) && is_array($data['daily'])) {
            $data['daily'] = array_map(function ($r) { return (object) $r; }, $data['daily']);
        }

        // Normalize top_mitra entries (ensure mitra is model instance)
        if (isset($data['top_mitra']) && is_array($data['top_mitra'])) {
            $data['top_mitra'] = array_map(function ($item) {
                if (is_array($item)) $item = (object) $item;
                if (isset($item->mitra_id) && empty($item->mitra)) {
                    $item->mitra = \App\Models\Mitra::with('user')->find($item->mitra_id);
                }
                return $item;
            }, $data['top_mitra']);
        }

        // Normalize mitra_earnings if it was returned as array (from JSON) back into paginator
        if (isset($data['mitra_earnings']) && is_array($data['mitra_earnings']) && isset($data['mitra_earnings']['data'])) {
            $items = collect($data['mitra_earnings']['data'])->map(function ($item) {
                if (is_array($item)) $item = (object) $item;
                if (isset($item->mitra_id) && empty($item->mitra)) {
                    $item->mitra = \App\Models\Mitra::with('user')->find($item->mitra_id);
                }
                return $item;
            });
            $paginator = new \Illuminate\Pagination\LengthAwarePaginator($items, $data['mitra_earnings']['total'] ?? $items->count(), $data['mitra_earnings']['per_page'] ?? $items->count(), $data['mitra_earnings']['current_page'] ?? 1, ['path' => url('/admin/reports/finance')]);
            $data['mitra_earnings'] = $paginator;
        }

        // Normalize transactions array entries into objects for view convenience
        if (isset($data['transactions']) && is_array($data['transactions'])) {
            $data['transactions'] = array_map(function ($t) {
                return is_array($t) ? (object) $t : $t;
            }, $data['transactions']);
        }

        return view('admin.reports.finance', ['data' => $data, 'from' => $request->from ?? null, 'to' => $request->to ?? null]);
    }
}