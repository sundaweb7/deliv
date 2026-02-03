<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Setting;
use App\Models\User;
use App\Models\Mitra;

class AdminController extends Controller
{
    public function orders(Request $request)
    {
        $orders = Order::with('orderVendors.items.product')->get();
        return response()->json(['success' => true, 'message' => 'All orders', 'data' => $orders]);
    }

    public function updateSettings(Request $request)
    {
        $request->validate(['vendor_commission_percent' => 'required|numeric', 'admin_delivery_cut' => 'required|numeric', 'fcm_server_key' => 'nullable|string']);
        $s = Setting::first();
        $s->update($request->only(['vendor_commission_percent', 'admin_delivery_cut', 'fcm_server_key']));
        return response()->json(['success' => true, 'message' => 'Settings updated', 'data' => $s]);
    }

    // Simple user CRUD for admin
    public function index(Request $request)
    {
        $users = User::all();
        return response()->json(['success' => true, 'message' => 'Users', 'data' => $users]);
    }

    public function store(Request $request)
    {
        $data = $request->validate(['name' => 'required', 'email' => 'nullable|email|unique:users,email', 'phone' => 'required_without:email|string|unique:users,phone', 'password' => 'required|min:6', 'role' => 'required|in:admin,customer,mitra,driver']);
        $data['password'] = \Illuminate\Support\Facades\Hash::make($data['password']);
        $user = User::create($data);
        \App\Models\Wallet::firstOrCreate(['user_id' => $user->id], ['balance' => 0]);
        return response()->json(['success' => true, 'message' => 'Created', 'data' => $user]);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json(['success' => true, 'message' => 'User', 'data' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->validate(['name' => 'sometimes', 'email' => 'sometimes|email|unique:users,email,'.$id, 'phone' => 'nullable', 'role' => 'sometimes|in:admin,customer,mitra,driver']);
        if ($request->filled('password')) $data['password'] = \Illuminate\Support\Facades\Hash::make($request->password);
        $user->update($data);
        return response()->json(['success' => true, 'message' => 'Updated', 'data' => $user]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['success' => true, 'message' => 'Deleted']);
    }

    public function markPaid(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->payment_status = 'paid';
        $order->save();

        // For bank_transfer payments, process payouts for delivered vendors that haven't been processed
        if ($order->payment_method === 'bank_transfer') {
            $setting = Setting::first();
            $walletSvc = new \App\Services\WalletService();

            foreach ($order->orderVendors as $ov) {
                if ($ov->status === 'delivered' && !$ov->payout_processed) {
                    $subtotal = $ov->subtotal_food;
                    $deliveryFee = 0;
                    $vendorCommission = ($setting->vendor_commission_percent / 100) * $subtotal;
                    $adminDeliveryCut = ($setting->admin_delivery_cut / 100) * $deliveryFee;

                    $mitraUserId = $ov->mitra->user_id;
                    $walletSvc->credit($mitraUserId, $subtotal - $vendorCommission, 'Order payout');

                    $adminUser = User::where('role', 'admin')->first();
                    if ($adminUser) {
                        $walletSvc->credit($adminUser->id, $vendorCommission + $adminDeliveryCut, 'Admin commission', 'commission');
                    }

                    $ov->payout_processed = true;
                    $ov->save();
                }
            }
        }

        // dispatch whatsapp job to notify customer & mitra about payment confirmed
        try {
            \App\Jobs\SendOrderWhatsappNotification::dispatch($order->id)->afterCommit();
        } catch (\Throwable $e) {
            // ignore
        }

        return response()->json(['success' => true, 'message' => 'Order marked as paid', 'data' => $order]);
    }
}
