<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MitraStatusLog;

class MitraStatusLogController extends Controller
{
    public function index(Request $request)
    {
        $query = MitraStatusLog::with('mitra.user','user');

        if ($request->has('mitra_id')) {
            $query->where('mitra_id', $request->mitra_id);
        }
        if ($request->has('user_id')) {
            $query->where('user_id', $request->user_id);
        }
        if ($request->has('new_is_open')) {
            $query->where('new_is_open', (bool) $request->new_is_open);
        }
        if ($request->has('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->has('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $items = $query->orderBy('created_at', 'desc')->paginate(20);

        return response()->json(['success' => true, 'message' => 'Mitra status logs', 'data' => $items->items(), 'meta' => ['pagination' => $items->toArray()]]);
    }
}
