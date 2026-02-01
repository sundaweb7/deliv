<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Product;

class AppController extends Controller
{
    public function index(Request $request)
    {
        $slides = Slide::where('is_active', true)->orderBy('order')->get();
        $products = Product::where('is_active', true)->limit(20)->get();
        return view('app.index', ['slides' => $slides, 'products' => $products]);
    }
}
