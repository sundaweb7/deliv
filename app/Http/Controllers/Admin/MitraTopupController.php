<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MitraTopup;
use App\Services\WalletService;

class MitraTopupController extends Controller
{
    public function index(Request $request)
    {
        $q = MitraTopup::with('mitra.user','admin')->orderBy('created_at','desc');
        if ($request->has('status')) $q->where('status', $request->status);
        $data = $q->paginate(20);
        return response()->json(['success'=>true,'message'=>'Topup requests','data'=>$data]);
    }

    public function approve(Request $request, $id)
    {
        $topup = MitraTopup::findOrFail($id);
        if ($topup->status !== 'pending') return response()->json(['success'=>false,'message'=>'Topup not pending'], 400);

        $walletSvc = new WalletService();
        // credit mitra user wallet with type 'topup' and broadcast transaction
        $tx = $walletSvc->credit($topup->user_id, (float)$topup->amount, 'Topup', 'topup');

        $topup->status = 'approved';
        $topup->admin_id = $request->user()->id;
        $topup->save();



        return response()->json(['success'=>true,'message'=>'Topup approved','data'=>$topup]);
    }

    public function reject(Request $request, $id)
    {
        $topup = MitraTopup::findOrFail($id);
        if ($topup->status !== 'pending') return response()->json(['success'=>false,'message'=>'Topup not pending'], 400);
        $topup->status = 'rejected';
        $topup->admin_id = $request->user()->id;
        $topup->notes = $request->notes ?? null;
        $topup->save();
        return response()->json(['success'=>true,'message'=>'Topup rejected','data'=>$topup]);
    }
}