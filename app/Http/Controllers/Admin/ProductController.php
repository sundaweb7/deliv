<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $q = Product::with('mitra.user')->paginate(20);
        return response()->json(['success' => true, 'message' => 'Products', 'data' => $q]);
    }

    public function store(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'name' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'mitra_id' => 'required|integer|exists:mitras,id',
            'category_id' => 'nullable|integer|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:5120',
        ]);
        $validator->validate();

        $data = $request->only(['name','price','stock','mitra_id','category_id','description','is_active']);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = \App\Services\ProductImageService::storeUploaded($file);
            $data['image'] = $filename;
        }

        $product = Product::create($data);
        return response()->json(['success'=>true,'message'=>'Created','data'=>$product->fresh()], 201);
    }

    public function show($id)
    {
        $p = Product::with('mitra.user')->findOrFail($id);
        return response()->json(['success'=>true,'message'=>'Product','data'=>$p]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'name' => 'sometimes|required|string',
            'price' => 'sometimes|required|numeric',
            'stock' => 'sometimes|required|integer',
            'mitra_id' => 'sometimes|required|integer|exists:mitras,id',
            'category_id' => 'nullable|integer|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:5120',
        ]);
        $validator->validate();

        $data = $request->only(['name','price','stock','mitra_id','category_id','description','is_active']);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete('products/originals/' . $product->image);
                Storage::disk('public')->delete('products/thumb/' . $product->image);
            }
            $file = $request->file('image');
            $filename = \App\Services\ProductImageService::storeUploaded($file);
            $data['image'] = $filename;
        }

        $product->update($data);
        return response()->json(['success'=>true,'message'=>'Updated','data'=>$product->fresh()]);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->image) {
            Storage::disk('public')->delete('products/originals/' . $product->image);
            Storage::disk('public')->delete('products/thumb/' . $product->image);
        }
        $product->delete();
        return response()->json(['success'=>true,'message'=>'Deleted']);
    }
}
