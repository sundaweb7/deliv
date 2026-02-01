<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bank;

class BankController extends Controller
{
    public function index()
    {
        $banks = Bank::all();
        return response()->json(['success'=>true,'message'=>'Banks list','data'=>$banks]);
    }

    public function store(Request $request)
    {
        $data = $request->validate(['name'=>'required|string','account_name'=>'nullable|string','account_number'=>'nullable|string','type'=>'nullable|string','is_active'=>'nullable|boolean']);
        $b = Bank::create($data);
        return response()->json(['success'=>true,'message'=>'Created','data'=>$b]);
    }

    public function update(Request $request, $id)
    {
        $b = Bank::findOrFail($id);
        $data = $request->validate(['name'=>'sometimes|string','account_name'=>'nullable|string','account_number'=>'nullable|string','type'=>'nullable|string','is_active'=>'nullable|boolean']);
        $b->update($data);
        return response()->json(['success'=>true,'message'=>'Updated','data'=>$b->fresh()]);
    }

    public function destroy($id)
    {
        Bank::findOrFail($id)->delete();
        return response()->json(['success'=>true,'message'=>'Deleted']);
    }
}