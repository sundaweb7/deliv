@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Shipping Models</h1>
    <a href="{{ route('mitra.shippings.create') }}" class="btn btn-primary">Create Model</a>
    <table class="table mt-3">
        <thead><tr><th>ID</th><th>Name</th><th>Active</th><th>Actions</th></tr></thead>
        <tbody>
            @foreach($models as $m)
            <tr>
                <td>{{ $m['id'] }}</td>
                <td>{{ $m['name'] }}</td>
                <td>{{ $m['is_active'] ? 'Yes' : 'No' }}</td>
                <td>
                    <a href="{{ route('mitra.shippings.edit', ['id'=>$m['id']]) }}" class="btn btn-sm btn-secondary">Edit</a>
                    <form action="{{ route('mitra.shippings.destroy', ['id'=>$m['id']]) }}" method="post" style="display:inline">@csrf @method('delete')<button class="btn btn-sm btn-danger">Delete</button></form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection