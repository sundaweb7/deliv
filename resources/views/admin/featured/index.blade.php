@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Featured Products</h1>
    <a href="{{ route('admin.featured.create') }}" class="btn btn-primary">Add Featured Product</a>
    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Position</th>
                <th>Product</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $it)
            <tr>
                <td>{{ $it['id'] }}</td>
                <td>{{ $it['position'] }}</td>
                <td>{{ $it['product']['title'] ?? '—' }}</td>
                <td>
                    <a href="{{ route('admin.featured.edit', ['featured' => $it['id']]) }}" class="btn btn-sm btn-secondary">Edit</a>
                    <form action="{{ route('admin.featured.destroy', ['featured' => $it['id']]) }}" method="post" style="display:inline" onsubmit="return confirm('Delete?')">
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection