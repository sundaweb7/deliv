<?php

namespace App\Http\Controllers\AdminUI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminBaseController extends Controller
{
    public function __construct()
    {
        // ensure admin session
        if (!session('admin_token')) {
            // for web controllers, redirect handled in middleware; here we'll rely on controller methods to check
        }
    }

    protected function ensureAdmin()
    {
        if (!session('admin_token')) {
            return redirect()->route('admin.login');
        }
        return null;
    }
}
