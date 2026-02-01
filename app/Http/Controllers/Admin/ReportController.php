<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\OrderVendor;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ReportController extends Controller
{
    public function finance(Request $request)
    {
        $request->validate([
            'from' => 'nullable|date',
            'to' => 'nullable|date',
            'export' => 'nullable|in:csv',
        ]);

        $from = $request->input('from');
        $to = $request->input('to');

        $ordersQuery = Order::query();
        $txQuery = Transaction::query();
        $ovQuery = OrderVendor::query();

        if ($from) {
            $ordersQuery->whereDate('created_at', '>=', $from);
            $txQuery->whereDate('created_at', '>=', $from);
            $ovQuery->whereDate('created_at', '>=', $from);
        }
        if ($to) {
            $ordersQuery->whereDate('created_at', '<=', $to);
            $txQuery->whereDate('created_at', '<=', $to);
            $ovQuery->whereDate('created_at', '<=', $to);
        }

        $totalOrders = $ordersQuery->count();
        $totalRevenue = (float) $ordersQuery->sum('grand_total');
        $totalFood = (float) $ordersQuery->sum('total_food');
        $totalDelivery = (float) $ordersQuery->sum('delivery_fee');
        $totalAdminProfit = (float) $ordersQuery->sum('admin_profit');

        $txSummary = $txQuery->select('type', DB::raw('SUM(amount) as total'))->groupBy('type')->get();

        $topMitra = $ovQuery->select('mitra_id', DB::raw('SUM(subtotal_food) as revenue'))->groupBy('mitra_id')->orderByDesc('revenue')->with('mitra.user')->limit(10)->get();

        // Export CSV if requested (export=csv -> orders list)
        if ($request->input('export') === 'csv') {
            $filename = 'finance_report_' . now()->format('Ymd_His') . '.csv';
            $rows = Order::when($from, function ($q) use ($from) { $q->whereDate('created_at','>=',$from); })
                ->when($to, function ($q) use ($to) { $q->whereDate('created_at','<=',$to); })
                ->orderBy('created_at','desc')
                ->get(['id','customer_id','total_food','delivery_fee','admin_profit','grand_total','created_at']);

            $response = new StreamedResponse(function () use ($rows) {
                $out = fopen('php://output', 'w');
                fputcsv($out, ['id','customer_id','total_food','delivery_fee','admin_profit','grand_total','created_at']);
                foreach ($rows as $r) {
                    fputcsv($out, [$r->id,$r->customer_id,$r->total_food,$r->delivery_fee,$r->admin_profit,$r->grand_total,$r->created_at]);
                }
                fclose($out);
            });
            $disposition = 'attachment; filename="' . $filename . '"';
            $response->headers->set('Content-Type', 'text/csv');
            $response->headers->set('Content-Disposition', $disposition);
            return $response;
        }

        return response()->json([
            'success' => true,
            'message' => 'Finance report',
            'data' => [
                'totals' => [
                    'orders' => $totalOrders,
                    'total_revenue' => $totalRevenue,
                    'total_food' => $totalFood,
                    'total_delivery' => $totalDelivery,
                    'admin_profit' => $totalAdminProfit,
                ],
                'transactions' => $txSummary,
                'top_mitra' => $topMitra,
            ],
        ]);
    }
}