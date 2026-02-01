@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Edit Featured Product</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('admin.featured.update', ['featured' => $item['id']]) }}">
        @csrf
        @method('put')
        <div class="form-group">
            <label>Product</label>
            <select name="product_id" class="form-control">
                @foreach($products as $p)
                    <option value="{{ $p['id'] }}" {{ $item['product']['id'] == $p['id'] ? 'selected' : '' }}>{{ $p['title'] }} ({{ $p['price'] }})</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Position (1-10)</label>
            <input type="number" name="position" class="form-control" min="1" max="10" value="{{ $item['position'] }}">
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection