<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voucher;
use App\Http\Requests\VoucherRequest;
use App\Http\Resources\VoucherResource;

class VoucherController extends Controller
{
    public function index(Request $request)
    {
        $query = Voucher::query();
        if ($request->has('is_active')) $query->where('is_active', $request->is_active);
        $vouchers = $query->paginate(20);
        return response()->json(['success' => true, 'message' => 'Vouchers list', 'data' => VoucherResource::collection($vouchers), 'meta' => ['pagination' => $vouchers->toArray()]]);
    }

    public function store(VoucherRequest $request)
    {
        $v = Voucher::create($request->validated());
        return response()->json(['success' => true, 'message' => 'Voucher created', 'data' => new VoucherResource($v)]);
    }

    public function show($id)
    {
        $v = Voucher::findOrFail($id);
        return response()->json(['success' => true, 'message' => 'Voucher detail', 'data' => new VoucherResource($v)]);
    }

    public function update(VoucherRequest $request, $id)
    {
        $v = Voucher::findOrFail($id);
        $v->update($request->validated());
        return response()->json(['success' => true, 'message' => 'Voucher updated', 'data' => new VoucherResource($v->fresh())]);
    }

    public function destroy($id)
    {
        $v = Voucher::findOrFail($id);
        $v->delete();
        return response()->json(['success' => true, 'message' => 'Voucher deleted']);
    }

    public function toggle($id)
    {
        $v = Voucher::findOrFail($id);
        $v->is_active = !$v->is_active;
        $v->save();
        return response()->json(['success' => true, 'message' => 'Voucher toggled', 'data' => new VoucherResource($v->fresh())]);
    }
}
