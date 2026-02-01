<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    // API: set open/closed
    public function setOpen(Request $request)
    {
        $request->validate(['is_open' => 'required|boolean', 'reason' => 'nullable|string|max:500']);
        $mitra = $request->user()->mitra;
        if (!$mitra) return response()->json(['success' => false, 'message' => 'Mitra profile not found'], 404);

        $old = $mitra->is_open;
        $mitra->is_open = $request->is_open;
        $mitra->save();

        // create audit log
        try {
            \App\Models\MitraStatusLog::create([
                'mitra_id' => $mitra->id,
                'user_id' => $request->user()->id ?? null,
                'old_is_open' => $old,
                'new_is_open' => $mitra->is_open,
                'reason' => $request->input('reason') ?? null,
            ]);
        } catch (\Throwable $e) {
            // ignore silently (should not fail the main flow)
        }

        return response()->json(['success' => true, 'message' => 'Store status updated', 'data' => ['is_open' => (bool) $mitra->is_open]]);
    }

    // recent logs for this mitra
    public function logs(Request $request)
    {
        $mitra = $request->user()->mitra;
        if (!$mitra) return response()->json(['success' => false, 'message' => 'Mitra profile not found'], 404);
        $logs = \App\Models\MitraStatusLog::where('mitra_id', $mitra->id)->orderBy('created_at', 'desc')->take(20)->get();
        return response()->json(['success' => true, 'message' => 'Logs', 'data' => $logs]);
    }

    // Web UI: show simple page
    public function show(Request $request)
    {
        $mitra = $request->user()->mitra;
        if (!$mitra) return redirect('/');
        return view('mitra.store', ['mitra' => $mitra]);
    }

    // Web UI: toggle with POST form
    public function toggle(Request $request)
    {
        $mitra = $request->user()->mitra;
        if (!$mitra) return redirect('/');
        $old = $mitra->is_open;
        $mitra->is_open = $request->has('is_open') ? (bool)$request->input('is_open') : !$mitra->is_open;
        $mitra->save();

        try {
            \App\Models\MitraStatusLog::create([
                'mitra_id' => $mitra->id,
                'user_id' => $request->user()->id ?? null,
                'old_is_open' => $old,
                'new_is_open' => $mitra->is_open,
                'reason' => null,
            ]);
        } catch (\Throwable $e) {}

        return redirect()->route('mitra.store')->with('success','Store status updated');
    }

    // Attempt to reopen the store after mitra topup: require wallet balance > 0
    public function toggleReopen(Request $request)
    {
        $mitra = $request->user()->mitra;
        if (!$mitra) return redirect('/');

        $wallet = \App\Models\Wallet::firstOrCreate(['user_id' => $request->user()->id], ['balance' => 0]);
        if ($wallet->balance <= 0) {
            return redirect()->route('mitra.store')->with('error','Your wallet balance is insufficient to reopen the store. Please topup.');
        }

        $old = $mitra->is_open;
        $mitra->is_open = true;
        $mitra->save();

        try {
            \App\Models\MitraStatusLog::create([
                'mitra_id' => $mitra->id,
                'user_id' => $request->user()->id ?? null,
                'old_is_open' => $old,
                'new_is_open' => $mitra->is_open,
                'reason' => 'Reopened after topup',
            ]);
        } catch (\Throwable $e) {}

        return redirect()->route('mitra.store')->with('success','Store reopened');
    }
}
