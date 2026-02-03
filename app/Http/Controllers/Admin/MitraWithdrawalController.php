<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MitraWithdrawal;
use App\Services\WalletService;
use App\Models\User;

class MitraWithdrawalController extends Controller
{
    public function index(Request $request)
    {
        $items = MitraWithdrawal::with('mitra','user','processor')->orderBy('created_at','desc')->get();
        return response()->json(['success'=>true,'message'=>'Withdrawals','data'=>$items]);
    }

    public function approve(Request $request, $id)
    {
        $wd = MitraWithdrawal::findOrFail($id);
        if ($wd->status !== 'pending') return response()->json(['success'=>false,'message'=>'Not pending'], 422);

        // set to 'pending' processing state to indicate admin accepted request for manual processing
        $wd->status = 'processing';
        $wd->processed_by = $request->user()->id ?? null;
        $wd->processed_at = now();
        $wd->save();

        // notify mitra via WA/FCM (best-effort)
        try {
            $wa = new \App\Services\WhatsappService();
            $settings = \App\Models\Setting::orderBy('id','desc')->first();
            if ($settings && $settings->wa_send_to_mitra) {
                $mitraPhone = $wd->mitra->wa_number ?? $wd->mitra->user->phone ?? null;
                if ($mitraPhone) {
                    $mitraPhone = \App\Services\PhoneHelper::normalizeIndoPhone($mitraPhone);
                    $msg = "Permintaan pencairan Anda sebesar Rp " . number_format($wd->amount,0,',','.') . " telah disetujui dan dalam proses.";
                    $wa->sendTextRaw($mitraPhone, $msg);
                }
            }
        } catch (\Throwable $e) {}

        return response()->json(['success'=>true,'message'=>'Marked as processing','data'=>$wd]);
    }

    public function complete(Request $request, $id)
    {
        $wd = MitraWithdrawal::findOrFail($id);
        if (!in_array($wd->status, ['pending','processing'])) return response()->json(['success'=>false,'message'=>'Not pending or processing'], 422);

        // perform debit now (transfer assumed successful) and mark success
        try {
            \Illuminate\Support\Facades\Log::info('Attempting debit for withdrawal', ['user_id' => $wd->user_id, 'amount' => $wd->amount]);
            $walletSvc = new WalletService();
            $walletSvc->debit($wd->user_id, $wd->amount, 'Withdrawal #' . $wd->id, 'withdrawal');
            \Illuminate\Support\Facades\Log::info('Debit succeeded for withdrawal', ['user_id' => $wd->user_id, 'amount' => $wd->amount]);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Withdrawal complete debit failed: ' . $e->getMessage());
            return response()->json(['success'=>false,'message'=>'Failed to debit wallet: ' . $e->getMessage()], 422);
        }

        $wd->status = 'success';
        $wd->is_debited = true;
        $wd->processed_by = $request->user()->id ?? null;
        $wd->processed_at = now();
        $wd->save();

        // notify mitra
        try {
            $wa = new \App\Services\WhatsappService();
            $settings = \App\Models\Setting::orderBy('id','desc')->first();
            if ($settings && $settings->wa_send_to_mitra) {
                $mitraPhone = $wd->mitra->wa_number ?? $wd->mitra->user->phone ?? null;
                if ($mitraPhone) {
                    $mitraPhone = \App\Services\PhoneHelper::normalizeIndoPhone($mitraPhone);
                    $msg = "Pencairan saldo Anda sebesar Rp " . number_format($wd->amount,0,',','.') . " berhasil diproses.";
                    $wa->sendTextRaw($mitraPhone, $msg);
                }
            }
        } catch (\Throwable $e) {}

        return response()->json(['success'=>true,'message'=>'Completed','data'=>$wd]);
    }
    public function reject(Request $request, $id)
    {
        $wd = MitraWithdrawal::findOrFail($id);
        if (!in_array($wd->status, ['pending','processing','success'])) return response()->json(['success'=>false,'message'=>'Not pending/processing/success'], 422);

        // if already debited, refund
        if ($wd->is_debited) {
            try {
                $walletSvc = new WalletService();
                $walletSvc->credit($wd->user_id, $wd->amount, 'Withdrawal refund #' . $wd->id);
            } catch (\Exception $e) {
                return response()->json(['success'=>false,'message'=>'Failed to refund: ' . $e->getMessage()], 422);
            }
            $wd->is_debited = false;
        }

        $wd->status = 'failed';
        $wd->processed_by = $request->user()->id ?? null;
        $wd->processed_at = now();
        $wd->save();

        // notify mitra
        try {
            $wa = new \App\Services\WhatsappService();
            $settings = \App\Models\Setting::orderBy('id','desc')->first();
            if ($settings && $settings->wa_send_to_mitra) {
                $mitraPhone = $wd->mitra->wa_number ?? $wd->mitra->user->phone ?? null;
                if ($mitraPhone) {
                    $mitraPhone = \App\Services\PhoneHelper::normalizeIndoPhone($mitraPhone);
                    $msg = "Permintaan pencairan saldo sebesar Rp " . number_format($wd->amount,0,',','.') . " ditolak atau gagal diproses.";
                    $wa->sendTextRaw($mitraPhone, $msg);
                }
            }
        } catch (\Throwable $e) {}

        return response()->json(['success'=>true,'message'=>'Rejected','data'=>$wd]);
    }
}
