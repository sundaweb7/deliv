<?php

namespace App\Http\Controllers\AdminUI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        if ($r = (new \App\Http\Controllers\AdminUI\AdminBaseController())->ensureAdmin()) return $r;
        $resp = app(\App\Http\Controllers\Admin\AdminController::class)->orders($request);
        $data = $resp instanceof \Illuminate\Http\JsonResponse ? $resp->getData(true)['data'] ?? [] : [];
        return view('admin.orders.index', ['orders' => $data]);
    }

    public function markPaid(Request $request, $id)
    {
        if ($r = (new \App\Http\Controllers\AdminUI\AdminBaseController())->ensureAdmin()) return $r;
        app(\App\Http\Controllers\Admin\AdminController::class)->markPaid($request, $id);
        return redirect()->route('admin.orders.index')->with('success','Order marked paid');
    }
}