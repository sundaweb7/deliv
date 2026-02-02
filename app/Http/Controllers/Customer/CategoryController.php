<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        // order categories by admin-defined order (default 0)
        $cats = Category::orderBy('order')->get();
        return response()->json(['success'=>true,'message'=>'List categories','data'=>$cats]);
    }
}