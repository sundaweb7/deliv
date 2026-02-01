<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function stats()
    {
        $totalUsers = User::count();
        $customers = User::where('role', 'customer')->count();
        $mitras = User::where('role', 'mitra')->count();
        $drivers = User::where('role', 'driver')->count();

        $totalOrders = Order::count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $totalRevenue = Order::sum('grand_total');
        $adminCommission = Transaction::where('type', 'commission')->sum('amount');

        return response()->json([
            'success' => true,
            'message' => 'Admin dashboard stats',
            'data' => [
                'users' => [
                    'total' => $totalUsers,
                    'customers' => $customers,
                    'mitras' => $mitras,
                    'drivers' => $drivers,
                ],
                'orders' => [
                    'total' => $totalOrders,
                    'pending' => $pendingOrders,
                ],
                'finance' => [
                    'total_revenue' => (float) $totalRevenue,
                    'admin_commission' => (float) $adminCommission,
                ],
            ],
        ]);
    }
}
