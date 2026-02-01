<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'nullable|email|required_without:phone',
            'phone' => 'nullable|required_without:email',
            'password' => 'required|string'
        ]);

        $user = null;
        if (!empty($data['phone'])) {
            $user = User::where('phone', $data['phone'])->first();
        } elseif (!empty($data['email'])) {
            $user = User::where('email', $data['email'])->first();
        }

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
        }

        Auth::login($user);
        // optional: store api token for client-side use
        session(['user_token' => $user->createToken('web-ui')->plainTextToken, 'user_id' => $user->id]);

        return redirect()->route('app.home');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        session()->forget(['user_token','user_id']);
        return redirect()->route('login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(\App\Http\Requests\RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $data['role'] = $data['role'] ?? 'customer';

        $user = User::create($data);
        Auth::login($user);
        session(['user_token' => $user->createToken('web-ui')->plainTextToken, 'user_id' => $user->id]);

        return redirect()->route('app.home');
    }
}
