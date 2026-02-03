<?php

namespace App\Http\Controllers\AdminUI;

use App\Http\Controllers\AdminUI\AdminBaseController;
use Illuminate\Http\Request;
use App\Models\MitraWithdrawal;
use App\Services\WalletService;

class WithdrawalController extends AdminBaseController
{
    public function index(Request $request)
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;

        $query = MitraWithdrawal::with('mitra.user','processor')->orderBy('created_at','desc');
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }
        $items = $query->paginate(20);
        return view('admin.mitra_withdrawals.index', ['withdrawals' => $items]);
    }

    public function show($id)
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        $wd = MitraWithdrawal::with('mitra.user','processor')->findOrFail($id);
        return view('admin.mitra_withdrawals.show', ['wd' => $wd]);
    }

    public function approve(Request $request, $id)
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        $wd = MitraWithdrawal::findOrFail($id);
        if ($wd->status !== 'pending') return redirect()->back()->with('error','Not pending');

        $wd->status = 'processing';
        $wd->processed_by = session('admin_user_id') ?? null;
        $wd->processed_at = now();
        $wd->save();

        // best effort notify - reuse Admin logic
        try {
            $wa = new \App\Services\WhatsappService();
            $settings = \App\Models\Setting::orderBy('id','desc')->first();
            if ($settings && $settings->wa_send_to_mitra) {
                $mitraPhone = $wd->mitra->wa_number ?? $wd->mitra->user->phone ?? null;
                if ($mitraPhone) {
                    $mitraPhone = \App\Services\PhoneHelper::normalizeIndoPhone($mitraPhone);
                    $msg = "Permintaan pencairan Anda sebesar Rp " . number_format($wd->amount,0,',','.'). " telah disetujui dan dalam proses.";
                    $wa->sendTextRaw($mitraPhone, $msg);
                }
            }
        } catch (\Throwable $e) {}

        return redirect()->route('admin.mitra-withdrawals.show', ['id' => $wd->id])->with('success','Marked as processing');
    }

    public function complete(Request $request, $id)
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        $wd = MitraWithdrawal::findOrFail($id);
        if (!in_array($wd->status, ['pending','processing'])) return redirect()->back()->with('error','Not pending or processing');

        try {
            $walletSvc = new WalletService();
            $walletSvc->debit($wd->user_id, $wd->amount, 'Withdrawal #' . $wd->id, 'withdrawal');
        } catch (\Exception $e) {
            return redirect()->back()->with('error','Failed to debit wallet: ' . $e->getMessage());
        }

        $wd->status = 'success';
        $wd->is_debited = true;
        $wd->processed_by = session('admin_user_id') ?? null;
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
                    $msg = "Pencairan saldo Anda sebesar Rp " . number_format($wd->amount,0,',','.'). " berhasil diproses.";
                    $wa->sendTextRaw($mitraPhone, $msg);
                }
            }
        } catch (\Throwable $e) {}

        return redirect()->route('admin.mitra-withdrawals.show', ['id' => $wd->id])->with('success','Completed');
    }

    public function reject(Request $request, $id)
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        $wd = MitraWithdrawal::findOrFail($id);
        if (!in_array($wd->status, ['pending','processing','success'])) return redirect()->back()->with('error','Not pending/processing/success');

        if ($wd->is_debited) {
            try {
                $walletSvc = new WalletService();
                $walletSvc->credit($wd->user_id, $wd->amount, 'Withdrawal refund #' . $wd->id);
            } catch (\Exception $e) {
                return redirect()->back()->with('error','Failed to refund: ' . $e->getMessage());
            }
            $wd->is_debited = false;
        }

        $wd->status = 'failed';
        $wd->processed_by = session('admin_user_id') ?? null;
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
                    $msg = "Permintaan pencairan saldo sebesar Rp " . number_format($wd->amount,0,',','.'). " ditolak atau gagal diproses.";
                    $wa->sendTextRaw($mitraPhone, $msg);
                }
            }
        } catch (\Throwable $e) {}

        return redirect()->route('admin.mitra-withdrawals.show', ['id' => $wd->id])->with('success','Rejected');
    }
}
