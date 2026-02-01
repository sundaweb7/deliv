@extends('layout')

@section('content')
<div style="max-width:480px;margin:40px auto;padding:20px;border:1px solid #eee;border-radius:8px;background:#fff">
    <h2>Edit Product</h2>
    @if ($errors->any())
        <div style="color:#b00020;margin-bottom:10px">{{ implode(', ', $errors->all()) }}</div>
    @endif
    <form method="post" action="{{ route('mitra.products.update', ['product' => $product->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div style="margin-bottom:10px">
            <label>Name</label>
            <input type="text" name="name" value="{{ $product->name }}" style="width:100%;padding:8px">
        </div>
        <div style="margin-bottom:10px">
            <label>Description</label>
            <textarea name="description" style="width:100%;padding:8px">{{ $product->description }}</textarea>
        </div>
        <div style="margin-bottom:10px">
            <label>Price</label>
            <input type="number" name="price" value="{{ $product->price }}" style="width:100%;padding:8px">
        </div>
        <div style="margin-bottom:10px">
            <label>Stock</label>
            <input type="number" name="stock" value="{{ $product->stock }}" style="width:100%;padding:8px">
        </div>
        <div style="margin-bottom:10px">
            <label>Image</label>
            @if($product->image) <div><img src="{{ $product->thumb_url }}" style="height:80px;margin-bottom:8px"></div> @endif
            <input type="file" name="image">
        </div>
        <div style="display:flex;gap:8px;align-items:center">
            <button class="btn">Update</button>
            <a href="{{ route('mitra.products.index') }}">Back</a>
        </div>
    </form>
</div>
@endsection