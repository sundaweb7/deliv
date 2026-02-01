@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Add Featured Product</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('admin.featured.store') }}">
        @csrf
        <div class="form-group">
            <label>Product</label>
            <select name="product_id" class="form-control">
                @foreach($products as $p)
                    <option value="{{ $p['id'] }}">{{ $p['title'] }} ({{ $p['price'] }})</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Position (1-10)</label>
            <input type="number" name="position" class="form-control" min="1" max="10">
        </div>
        <button class="btn btn-primary">Add</button>
    </form>
</div>
@endsection