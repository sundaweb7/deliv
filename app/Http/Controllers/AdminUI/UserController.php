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

    public function destroy($id)
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        $u = User::findOrFail($id);
        $u->delete();
        return redirect()->route('admin.users.index')->with('success','User deleted');
    }
}
