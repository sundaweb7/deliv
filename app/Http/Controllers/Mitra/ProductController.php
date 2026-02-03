<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $mitra = $request->user()->mitra;
        $query = Product::where('mitra_id', $mitra->id);

        if ($request->has('q')) {
            $term = $request->q;
            $query->where(function($q) use ($term) {
                $q->where('name', 'like', '%' . $term . '%')
                  ->orWhere('description', 'like', '%' . $term . '%')
                  ->orWhereHas('category', function($qq) use ($term) { $qq->where('name', 'like', '%' . $term . '%'); });
            });
        }

        // sorting and pagination
        $allowedSorts = ['id','name','price','created_at'];
        $sort = $request->input('sort', 'id');
        if (!in_array($sort, $allowedSorts)) $sort = 'id';
        $order = strtolower($request->input('order', 'asc')) === 'desc' ? 'desc' : 'asc';
        $perPage = max(1, (int) $request->input('per_page', 20));
        $page = max(1, (int) $request->input('page', 1));

        $paginated = $query->orderBy($sort, $order)->paginate($perPage, ['*'], 'page', $page);
        $meta = [
            'current_page' => $paginated->currentPage(),
            'per_page' => $paginated->perPage(),
            'total' => $paginated->total(),
            'last_page' => $paginated->lastPage(),
        ];

        return response()->json(['success' => true, 'message' => 'Products', 'data' => $paginated->items(), 'meta' => $meta]);
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $mitra = $request->user()->mitra;

        // ensure mitra_id present for validation
        $request->merge(['mitra_id' => $mitra->id]);

        $pReq = \App\Http\Requests\ProductRequest::createFrom($request);
        $pReq->setContainer(app());
        $pReq->setRedirector(app('redirect'));
        $pReq->validateResolved();

        $data = $pReq->validated();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = \App\Services\ProductImageService::storeUploaded($file);
            $data['image'] = $filename;
        }

        $product = Product::create(array_merge($data, ['mitra_id' => $mitra->id]));
        return response()->json(['success' => true, 'message' => 'Created', 'data' => $product->fresh()]);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json(['success' => true, 'message' => 'Product', 'data' => $product]);
    }

    public function update(\Illuminate\Http\Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // ensure mitra_id for validation (keep current)
        $request->merge(['mitra_id' => $product->mitra_id]);
        // prefill required fields with existing values so partial updates are allowed
        if (!$request->has('price')) $request->merge(['price' => $product->price]);
        if (!$request->has('stock')) $request->merge(['stock' => $product->stock]);
        if (!$request->has('name')) $request->merge(['name' => $product->name]);

        $pReq = \App\Http\Requests\ProductRequest::createFrom($request);
        $pReq->setContainer(app());
        $pReq->setRedirector(app('redirect'));
        $pReq->validateResolved();
        $data = $pReq->validated();

        if ($request->hasFile('image')) {
            // delete old originals and thumbs
            if ($product->image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete('products/originals/' . $product->image);
                \Illuminate\Support\Facades\Storage::disk('public')->delete('products/thumb/' . $product->image);
            }

            $file = $request->file('image');
            $filename = \App\Services\ProductImageService::storeUploaded($file);
            $data['image'] = $filename;
        }
        $product->update($data);
        return response()->json(['success' => true, 'message' => 'Updated', 'data' => $product->fresh()]);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->image) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete('products/originals/' . $product->image);
            \Illuminate\Support\Facades\Storage::disk('public')->delete('products/thumb/' . $product->image);
        }
        $product->delete();
        return response()->json(['success' => true, 'message' => 'Deleted']);
    }
}
