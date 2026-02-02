@extends('admin.layout')

@section('content')
    <h1>Create Category</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
            <label>Icon</label>
            <input type="file" name="icon" class="form-control" accept="image/*" required>
        </div>
        <div class="form-group">
            <label>Order</label>
            <input type="number" name="order" class="form-control" value="{{ old('order', 0) }}">
        </div>
        <button class="btn btn-primary">Create</button>
    </form>
@endsection
