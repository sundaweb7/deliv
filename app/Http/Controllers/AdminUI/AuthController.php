<?php

namespace App\Http\Controllers\AdminUI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
        }

        if ($user->role !== 'admin') {
            return back()->withErrors(['email' => 'User is not admin'])->withInput();
        }

        // create personal access token
        $token = $user->createToken('admin-ui')->plainTextToken;
        session(['admin_token' => $token, 'admin_user_id' => $user->id]);

        return redirect()->route('admin.dashboard');
    }

    public function logout()
    {
        $token = session('admin_token');
        if ($token) {
            // revoke token
            $user = User::find(session('admin_user_id'));
            if ($user) {
                $user->tokens()->where('token', hash('sha256', explode('|', $token)[1] ?? ''))->delete();
            }
        }
        session()->forget(['admin_token', 'admin_user_id']);
        return redirect()->route('admin.login');
    }
}
