<?php

namespace App\Http\Controllers\AdminUI;

use App\Http\Controllers\AdminUI\AdminBaseController;
use Illuminate\Http\Request;
use App\Models\Bank;

class BankController extends AdminBaseController
{
    public function index()
    {
        if ($r = $this->ensureAdmin()) return $r;
        $banks = Bank::paginate(20);
        return view('admin.banks.index', ['banks' => $banks]);
    }

    public function create()
    {
        if ($r = $this->ensureAdmin()) return $r;
        return view('admin.banks.create');
    }

    public function store(Request $request)
    {
        if ($r = $this->ensureAdmin()) return $r;
        $data = $request->validate(['name'=>'required','account_name'=>'nullable','account_number'=>'nullable','type'=>'nullable','is_active'=>'nullable|boolean']);
        Bank::create($data);
        return redirect()->route('admin.banks.index')->with('success','Bank created');
    }

    public function edit($id)
    {
        if ($r = $this->ensureAdmin()) return $r;
        $b = Bank::findOrFail($id);
        return view('admin.banks.edit', ['b'=>$b]);
    }

    public function update(Request $request, $id)
    {
        if ($r = $this->ensureAdmin()) return $r;
        $b = Bank::findOrFail($id);
        $data = $request->validate(['name'=>'required','account_name'=>'nullable','account_number'=>'nullable','type'=>'nullable','is_active'=>'nullable|boolean']);
        $b->update($data);
        return redirect()->route('admin.banks.index')->with('success','Bank updated');
    }

    public function destroy($id)
    {
        if ($r = $this->ensureAdmin()) return $r;
        Bank::findOrFail($id)->delete();
        return redirect()->route('admin.banks.index')->with('success','Bank deleted');
    }
}