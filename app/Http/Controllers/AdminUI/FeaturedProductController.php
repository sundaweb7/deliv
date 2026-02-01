<?php

namespace App\Http\Controllers\AdminUI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeaturedProductController extends Controller
{
    public function index(Request $request)
    {
        if (!session('admin_token')) return redirect()->route('admin.login');
        $resp = app(\App\Http\Controllers\Admin\FeaturedProductController::class)->index($request);
        $data = $resp instanceof \Illuminate\Http\JsonResponse ? $resp->getData(true)['data'] ?? [] : [];
        return view('admin.featured.index', ['items' => $data]);
    }

    public function create(Request $request)
    {
        if (!session('admin_token')) return redirect()->route('admin.login');
        // need list of products for selection
        $productsResp = app(\App\Http\Controllers\Customer\OrderController::class)->products($request);
        $products = $productsResp instanceof \Illuminate\Http\JsonResponse ? $productsResp->getData(true)['data'] ?? [] : [];
        return view('admin.featured.create', ['products' => $products]);
    }

    public function store(Request $request)
    {
        if (!session('admin_token')) return redirect()->route('admin.login');
        app(\App\Http\Controllers\Admin\FeaturedProductController::class)->store($request);
        return redirect()->route('admin.featured.index')->with('success','Featured product added');
    }

    public function edit(Request $request, $id)
    {
        if (!session('admin_token')) return redirect()->route('admin.login');
        $resp = app(\App\Http\Controllers\Admin\FeaturedProductController::class)->show($id);
        $data = $resp instanceof \Illuminate\Http\JsonResponse ? $resp->getData(true)['data'] ?? [] : [];
        $productsResp = app(\App\Http\Controllers\Customer\OrderController::class)->products($request);
        $products = $productsResp instanceof \Illuminate\Http\JsonResponse ? $productsResp->getData(true)['data'] ?? [] : [];
        return view('admin.featured.edit', ['item' => $data, 'products' => $products]);
    }

    public function update(Request $request, $id)
    {
        if (!session('admin_token')) return redirect()->route('admin.login');
        app(\App\Http\Controllers\Admin\FeaturedProductController::class)->update($request, $id);
        return redirect()->route('admin.featured.index')->with('success','Featured product updated');
    }

    public function destroy(Request $request, $id)
    {
        if (!session('admin_token')) return redirect()->route('admin.login');
        app(\App\Http\Controllers\Admin\FeaturedProductController::class)->destroy($id);
        return redirect()->route('admin.featured.index')->with('success','Featured product removed');
    }
}
