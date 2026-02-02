<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $data['role'] = $data['role'] ?? 'customer';

        // ensure email has placeholder if empty (DB requires NOT NULL)
        if (empty($data['email'])) {
            if (!empty($data['phone'])) {
                // normalize phone and derive email from digits
                $data['phone'] = \App\Services\PhoneHelper::normalizeIndoPhone($data['phone']);
                $pdigits = preg_replace('/\\D+/', '', $data['phone']);
                $data['email'] = $pdigits . '@no-reply.local';
            } else {
                $data['email'] = uniqid('user_') . '@no-reply.local';
            }
        } else {
            $data['email'] = trim($data['email']);
        }

        // normalize phone (08... => +628...) if not already normalized above
        if (!empty($data['phone'])) {
            $data['phone'] = \App\Services\PhoneHelper::normalizeIndoPhone($data['phone']);
        }

        $user = User::create($data);
        Wallet::create(['user_id' => $user->id, 'balance' => 0]);

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json(['success' => true, 'message' => 'Registered', 'data' => ['user' => $user, 'token' => $token]]);
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        $user = null;

        if (!empty($data['phone'])) {
            $rawPhone = $data['phone'];
            // normalize and prepare candidate variants to match legacy or normalized storage
            $normalized = \App\Services\PhoneHelper::normalizeIndoPhone($rawPhone);
            $digits = preg_replace('/\D+/', '', $rawPhone);
            $with62 = '62' . ltrim($digits, '0');
            $candidates = array_filter([$normalized, $rawPhone, $digits, $with62]);
            $user = User::whereIn('phone', $candidates)->first();
        } elseif (!empty($data['email'])) {
            $user = User::where('email', $data['email'])->first();
        }

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response()->json(['success' => false, 'message' => 'Invalid credentials'], 401);
        }

        $token = $user->createToken('api-token')->plainTextToken;
        return response()->json(['success' => true, 'message' => 'Logged in', 'data' => ['user' => $user, 'token' => $token]]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['success' => true, 'message' => 'Logged out']);
    }

    // return current authenticated user (with relations)
    public function me(Request $request)
    {
        $user = $request->user();
        if (!$user) return response()->json(['success' => false, 'message' => 'Unauthorized'],401);
        $user->load('mitra');

        // Attach mitra stats if mitra exists
        if ($user->mitra) {
            $mitra = $user->mitra;
            $mitra->products_count = $mitra->products()->count();
            $mitra->sales_count = \App\Models\OrderVendor::where('mitra_id', $mitra->id)->where('status', 'delivered')->count();
            $mitra->transactions_count = \App\Models\Transaction::whereHas('wallet', function($q) use ($user) { $q->where('user_id', $user->id); })->count();
            $user->mitra = $mitra;
        }



        return response()->json(['success' => true, 'message' => 'User', 'data' => $user]);
    }
}
