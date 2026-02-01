<?php

namespace App\Http\Controllers\AdminUI;

use App\Http\Controllers\AdminUI\AdminBaseController;
use Illuminate\Http\Request;
use App\Models\Voucher;

class VoucherController extends AdminBaseController
{
    public function index()
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        $vouchers = Voucher::paginate(20);
        return view('admin.vouchers.index', ['vouchers' => $vouchers]);
    }

    public function create()
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        return view('admin.vouchers.create');
    }

    public function store(Request $request)
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        $data = $request->validate(['code'=>'required|string|unique:vouchers,code','type'=>'required|in:percent,fixed','value'=>'required|numeric|min:0','usage_limit'=>'nullable|integer|min:1','min_order_amount'=>'nullable|numeric|min:0','starts_at'=>'nullable|date','expires_at'=>'nullable|date|after_or_equal:starts_at','is_active'=>'nullable|boolean']);
        Voucher::create($data);
        return redirect()->route('admin.vouchers.index')->with('success','Voucher created');
    }

    public function edit($id)
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        $v = Voucher::findOrFail($id);
        return view('admin.vouchers.edit', ['v' => $v]);
    }

    public function update(Request $request, $id)
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        $v = Voucher::findOrFail($id);
        $data = $request->validate(['code'=>'required|string|unique:vouchers,code,'.$v->id,'type'=>'required|in:percent,fixed','value'=>'required|numeric|min:0','usage_limit'=>'nullable|integer|min:1','min_order_amount'=>'nullable|numeric|min:0','starts_at'=>'nullable|date','expires_at'=>'nullable|date|after_or_equal:starts_at','is_active'=>'nullable|boolean']);
        $v->update($data);
        return redirect()->route('admin.vouchers.index')->with('success','Voucher updated');
    }

    public function destroy($id)
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        Voucher::findOrFail($id)->delete();
        return redirect()->route('admin.vouchers.index')->with('success','Voucher deleted');
    }

    public function toggle($id)
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        $v = Voucher::findOrFail($id);
        $v->is_active = !$v->is_active;
        $v->save();
        return redirect()->route('admin.vouchers.index')->with('success','Voucher toggled');
    }
}