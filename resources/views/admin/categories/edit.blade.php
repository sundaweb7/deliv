@extends('admin.layout')

@section('content')
    <h1>Edit Category</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.categories.update', $c->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $c->name) }}" required>
        </div>
        <div class="form-group">
            <label>Current Icon</label><br>
            @if($c->icon)
                <img src="{{ asset('storage/categories/thumb/' . $c->icon) }}" style="height:64px;">
            @endif
        </div>
        <div class="form-group">
            <label>Replace Icon</label>
            <input type="file" name="icon" class="form-control" accept="image/*">
        </div>
        <div class="form-group">
            <label>Order</label>
            <input type="number" name="order" class="form-control" value="{{ old('order', $c->order) }}">
        </div>
        <button class="btn btn-primary">Save</button>
    </form>
@endsection
