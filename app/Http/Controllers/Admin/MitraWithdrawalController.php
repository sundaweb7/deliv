    {
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
