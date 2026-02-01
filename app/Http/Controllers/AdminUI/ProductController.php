<?php

namespace App\Http\Controllers\AdminUI;

use App\Http\Controllers\AdminUI\AdminBaseController;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Mitra;

class ProductController extends AdminBaseController
{
    public function index(Request $request)
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        $products = Product::with('mitra.user')->paginate(20);
        return view('admin.products.index', ['products' => $products]);
    }

    public function create()
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        $mitras = Mitra::with('user')->get();
        return view('admin.products.create', ['mitras' => $mitras]);
    }

    public function store(Request $request)
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        // convert to ProductRequest so we reuse shared validation logic
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
        Product::create($data);
        return redirect()->route('admin.products.index')->with('success','Product created');
    }

    public function edit(Request $request, $id)
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        $product = Product::findOrFail($id);
        $mitras = Mitra::with('user')->get();
        return view('admin.products.edit', ['product' => $product, 'mitras' => $mitras]);
    }

    public function update(Request $request, $id)
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        $product = Product::findOrFail($id);

        // convert to ProductRequest for consistent validation
        $pReq = \App\Http\Requests\ProductRequest::createFrom($request);
        $pReq->setContainer(app());
        $pReq->setRedirector(app('redirect'));
        $pReq->validateResolved();

        $data = $pReq->validated();

        if ($request->hasFile('image')) {
            // remove previous originals and thumbs
            if ($product->image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete('products/originals/' . $product->image);
                \Illuminate\Support\Facades\Storage::disk('public')->delete('products/thumb/' . $product->image);
            }

            $file = $request->file('image');
            $filename = \App\Services\ProductImageService::storeUploaded($file);
            $data['image'] = $filename;
        }
        $product->update($data);
        return redirect()->route('admin.products.index')->with('success','Product updated');
    }

    public function destroy($id)
    {
        if ($redirect = $this->ensureAdmin()) return $redirect;
        $product = Product::findOrFail($id);
        if ($product->image) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete('products/originals/' . $product->image);
            \Illuminate\Support\Facades\Storage::disk('public')->delete('products/thumb/' . $product->image);
        }
        $product->delete();
        return redirect()->route('admin.products.index')->with('success','Product deleted');
    }
}