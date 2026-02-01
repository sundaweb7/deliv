<?php

namespace App\Http\Controllers\AdminUI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $token = session('admin_token');
        if (!$token) {
            return redirect()->route('admin.login');
        }

        // Reuse API Dashboard controller to get same JSON structure
        $resp = app(\App\Http\Controllers\Admin\DashboardController::class)->stats();
        $data = $resp instanceof \Illuminate\Http\JsonResponse ? $resp->getData(true)['data'] ?? [] : [];

        return view('admin.dashboard', ['data' => $data]);
    }
}
