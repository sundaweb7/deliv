@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Slides</h1>
    <a href="{{ route('admin.slides.create') }}" class="btn btn-primary">Create Slide</a>
    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Order</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($slides as $s)
            <tr>
                <td>{{ $s['id'] }}</td>
                <td>@if($s['image_url'])<img src="{{ $s['image_url'] }}" style="height:60px">@endif</td>
                <td>{{ $s['order'] }}</td>
                <td>{{ $s['is_active'] ? 'Yes' : 'No' }}</td>
                <td>
                    <a href="{{ route('admin.slides.edit', ['slide' => $s['id']]) }}" class="btn btn-sm btn-secondary">Edit</a>
                    <form action="{{ route('admin.slides.toggle', ['slide' => $s['id']]) }}" method="post" style="display:inline">
                        @csrf
                        <button class="btn btn-sm btn-warning">Toggle</button>
                    </form>
                    <form action="{{ route('admin.slides.destroy', ['slide' => $s['id']]) }}" method="post" style="display:inline" onsubmit="return confirm('Delete?')">
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