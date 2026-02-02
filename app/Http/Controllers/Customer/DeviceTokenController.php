<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DeviceToken;

class DeviceTokenController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(['token' => 'required|string', 'platform' => 'nullable|string']);
        $user = $request->user();

        \Log::info('DeviceTokenController: store called', [
            'token' => $request->token,
            'platform' => $request->platform,
            'user_id' => $user ? $user->id : null,
        ]);

        try {
            $device = DeviceToken::updateOrCreate(
                ['token' => $request->token],
                ['user_id' => $user->id, 'platform' => $request->platform, 'last_used_at' => now()]
            );
            \Log::info('DeviceTokenController: token stored', ['device_id' => $device->id, 'user_id' => $device->user_id]);
            return response()->json(['success' => true, 'message' => 'Token registered', 'data' => $device]);
        } catch (\Exception $e) {
            \Log::error('DeviceTokenController: store failed', ['message' => $e->getMessage(), 'token' => $request->token, 'user_id' => $user ? $user->id : null]);
            return response()->json(['success' => false, 'message' => 'Failed to register token'], 500);
        }
    }

    public function destroy(Request $request)
    {
        $request->validate(['token' => 'required|string']);
        $user = $request->user();
        \Log::info('DeviceTokenController: destroy called', ['token' => $request->token, 'user_id' => $user ? $user->id : null]);
        try {
            $token = DeviceToken::where('token', $request->token)->where('user_id', $user->id)->first();
            if ($token) {
                $token->delete();
                \Log::info('DeviceTokenController: token deleted', ['token' => $request->token, 'user_id' => $user->id]);
            } else {
                \Log::info('DeviceTokenController: token not found for delete', ['token' => $request->token, 'user_id' => $user->id]);
            }
            return response()->json(['success' => true, 'message' => 'Token removed']);
        } catch (\Exception $e) {
            \Log::error('DeviceTokenController: destroy failed', ['message' => $e->getMessage(), 'token' => $request->token, 'user_id' => $user ? $user->id : null]);
            return response()->json(['success' => false, 'message' => 'Failed to remove token'], 500);
        }
    }
}