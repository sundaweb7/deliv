<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DriverRoute;
use App\Models\Transaction;

class ReportController extends Controller
{
    public function earnings(Request $request)
    {
        $request->validate(['from'=>'nullable|date','to'=>'nullable|date']);
        $driver = $request->user()->driver;
        if (!$driver) return response()->json(['success'=>false,'message'=>'No driver attached'],403);

        $from = $request->from; $to = $request->to;

        $routes = DriverRoute::where('driver_id', $driver->id);
        if ($from) $routes->whereDate('created_at','>=',$from);
        if ($to) $routes->whereDate('created_at','<=',$to);

        $delivered = $routes->where('pickup_status','delivered')->count();

        // driver earnings are recorded as wallet credits to the driver user; aggregate them
        $tx = Transaction::whereHas('wallet', function ($q) use ($driver) { $q->where('user_id', $driver->user_id); });
        if ($from) $tx->whereDate('created_at','>=',$from);
        if ($to) $tx->whereDate('created_at','<=',$to);
        $credits = (float) $tx->where('type','credit')->sum('amount');
        $debits = (float) $tx->where('type','debit')->sum('amount');

        return response()->json(['success'=>true,'message'=>'Driver earnings','data'=>['delivered'=>$delivered,'credits'=>$credits,'debits'=>$debits,'net'=>$credits-$debits]]);
    }
}