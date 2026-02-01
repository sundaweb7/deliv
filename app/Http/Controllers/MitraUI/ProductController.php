<?php

namespace App\Http\Controllers\MitraUI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        if (!$user || !$user->mitra) return redirect()->route('login');
        $mitra = $user->mitra;
        $products = Product::where('mitra_id', $mitra->id)->get();
        return view('mitra.products.index', ['products' => $products]);
    }

    public function edit(Request $request, $id)
    {
        $user = $request->user();
        if (!$user || !$user->mitra) return redirect()->route('login');
        $product = Product::where('mitra_id', $user->mitra->id)->findOrFail($id);
        return view('mitra.products.edit', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $user = $request->user();
        if (!$user || !$user->mitra) return redirect()->route('login');
        $product = Product::where('mitra_id', $user->mitra->id)->findOrFail($id);

        $data = $request->validate(['name'=>'required|string','description'=>'nullable|string','price'=>'required|numeric','stock'=>'required|integer','image'=>'nullable|image|mimes:jpeg,jpg,png,gif|max:5120']);

        if ($request->hasFile('image')) {
            if ($product->image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete('products/originals/' . $product->image);
                \Illuminate\Support\Facades\Storage::disk('public')->delete('products/thumb/' . $product->image);
            }
            $file = $request->file('image');
            $filename = \App\Services\ProductImageService::storeUploaded($file);
            $data['image'] = $filename;
        }

        $product->update($data);
        return redirect()->route('mitra.products.index')->with('success','Product updated');
    }
}