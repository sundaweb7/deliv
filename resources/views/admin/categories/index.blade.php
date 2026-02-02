@extends('admin.layout')

@section('content')
    <h1>Categories</h1>
    <p><a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Create Category</a></p>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Icon</th>
                <th>Name</th>
                <th>Order</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $cat)
                <tr>
                    <td>{{ $cat->id }}</td>
                    <td>
                        @if($cat->icon)
                            <img src="{{ asset('storage/categories/thumb/' . $cat->icon) }}" style="height:48px;" alt="icon">
                        @endif
                    </td>
                    <td>{{ $cat->name }}</td>
                    <td>{{ $cat->order }}</td>
                    <td>
                        <a href="{{ route('admin.categories.edit', $cat->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                        <form action="{{ route('admin.categories.destroy', $cat->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Delete category?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $categories->links() }}
@endsection
