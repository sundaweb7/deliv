<?php

namespace App\Http\Controllers\AdminUI;

use App\Http\Controllers\AdminUI\AdminBaseController;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends AdminBaseController
{
    public function index(Request $request)
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        $query = User::query();
        if ($request->has('role')) $query->where('role', $request->role);
        $users = $query->paginate(20);
        return view('admin.users.index', ['users' => $users]);
    }

    public function create()
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|string|max:50',
            'wa_number' => 'nullable|string|max:50',
            'address' => 'nullable|string',
            'profile_photo' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:5120',
            'role' => 'required|in:admin,mitra,driver,customer',
            'password' => 'required|string|min:6',
        ]);

        if (!empty($data['phone'])) $data['phone'] = \App\Services\PhoneHelper::normalizeIndoPhone($data['phone']);
        if (!empty($data['wa_number'])) $data['wa_number'] = \App\Services\PhoneHelper::normalizeIndoPhone($data['wa_number']);

        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');
            $filename = time() . '_' . preg_replace('/[^a-z0-9\.\-]+/i','_', $file->getClientOriginalName());
            $file->storeAs('user-photos', $filename, 'public');
            $data['profile_photo'] = $filename;
        }

        $data['password'] = \Illuminate\Support\Facades\Hash::make($data['password']);
        $user = User::create($data);
        // create wallet
        \App\Models\Wallet::create(['user_id' => $user->id, 'balance' => 0]);

        return redirect()->route('admin.users.index')->with('success','User created');
    }

    public function edit($id)
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        $user = User::findOrFail($id);
        return view('admin.users.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        $user = User::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:50',
            'wa_number' => 'nullable|string|max:50',
            'address' => 'nullable|string',
            'profile_photo' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:5120',
            'role' => 'required|in:admin,mitra,driver,customer',
            'password' => 'nullable|string|min:6',
        ]);

        if (!empty($data['phone'])) $data['phone'] = \App\Services\PhoneHelper::normalizeIndoPhone($data['phone']);
        if (!empty($data['wa_number'])) $data['wa_number'] = \App\Services\PhoneHelper::normalizeIndoPhone($data['wa_number']);

        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');
            $filename = time() . '_' . preg_replace('/[^a-z0-9\.\-]+/i','_', $file->getClientOriginalName());
            $file->storeAs('user-photos', $filename, 'public');
            $data['profile_photo'] = $filename;
        }

        if (!empty($data['password'])) {
            $data['password'] = \Illuminate\Support\Facades\Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('admin.users.index')->with('success','User updated');
    }

    public function destroy($id)
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        $u = User::findOrFail($id);
        $u->delete();
        return redirect()->route('admin.users.index')->with('success','User deleted');
    }
}
