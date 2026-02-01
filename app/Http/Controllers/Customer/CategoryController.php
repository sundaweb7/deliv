<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $cats = Category::orderBy('name')->get();
        return response()->json(['success'=>true,'message'=>'List categories','data'=>$cats]);
    }
}