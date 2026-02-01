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

        $device = DeviceToken::updateOrCreate(
            ['token' => $request->token],
            ['user_id' => $user->id, 'platform' => $request->platform, 'last_used_at' => now()]
        );

        return response()->json(['success' => true, 'message' => 'Token registered', 'data' => $device]);
    }

    public function destroy(Request $request)
    {
        $request->validate(['token' => 'required|string']);
        $token = DeviceToken::where('token', $request->token)->where('user_id', $request->user()->id)->first();
        if ($token) $token->delete();

        return response()->json(['success' => true, 'message' => 'Token removed']);
    }
}