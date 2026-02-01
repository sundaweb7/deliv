<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeaturedProduct;
use App\Models\Product;
use App\Http\Requests\FeaturedProductRequest;
use App\Http\Resources\FeaturedProductResource;

class FeaturedProductController extends Controller
{
    public function index(Request $request)
    {
        $items = FeaturedProduct::with('product')->orderBy('position')->paginate(20);
        return response()->json(['success' => true, 'message' => 'Featured products', 'data' => FeaturedProductResource::collection($items), 'meta' => ['pagination' => $items->toArray()]]);
    }

    public function store(FeaturedProductRequest $request)
    {
        // limit 10
        if (FeaturedProduct::count() >= 10) {
            return response()->json(['success' => false, 'message' => 'Maximum 10 featured products allowed'], 422);
        }
        $data = $request->validated();
        // ensure unique position
        if (FeaturedProduct::where('position', $data['position'])->exists()) {
            return response()->json(['success' => false, 'message' => 'Position already taken'], 422);
        }
        $fp = FeaturedProduct::create($data);
        return response()->json(['success' => true, 'message' => 'Featured product added', 'data' => new FeaturedProductResource($fp->fresh())]);
    }

    public function show($id)
    {
        $fp = FeaturedProduct::with('product')->findOrFail($id);
        return response()->json(['success' => true, 'message' => 'Featured product detail', 'data' => new FeaturedProductResource($fp)]);
    }

    public function update(FeaturedProductRequest $request, $id)
    {
        $fp = FeaturedProduct::findOrFail($id);
        $data = $request->validated();
        if (isset($data['position']) && FeaturedProduct::where('position', $data['position'])->where('id','!=',$id)->exists()) {
            return response()->json(['success' => false, 'message' => 'Position already taken'], 422);
        }
        $fp->update($data);
        return response()->json(['success' => true, 'message' => 'Featured product updated', 'data' => new FeaturedProductResource($fp->fresh())]);
    }

    public function destroy($id)
    {
        $fp = FeaturedProduct::findOrFail($id);
        $fp->delete();
        return response()->json(['success' => true, 'message' => 'Featured product removed']);
    }
}
