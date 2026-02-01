@extends('admin.layout')

@section('content')
<div class="container">
    <h1>My Couriers</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr><th>ID</th><th>Name</th><th>Phone</th><th>Vehicle</th><th>Active</th><th>Actions</th></tr>
        </thead>
        <tbody>
            @foreach($couriers as $c)
                <tr>
                    <td>{{ $c->id }}</td>
                    <td>{{ $c->name }}</td>
                    <td>{{ $c->phone }}</td>
                    <td>{{ $c->vehicle }}</td>
                    <td>{{ $c->is_active ? 'Yes' : 'No' }}</td>
                    <td>
                        <form style="display:inline" method="POST" action="{{ route('mitra.couriers.update', $c->id) }}">@csrf @method('PUT')
                            <input type="hidden" name="is_active" value="{{ $c->is_active ? 0 : 1 }}">
                            <button class="btn btn-sm btn-warning">{{ $c->is_active ? 'Deactivate' : 'Activate' }}</button>
                        </form>
                        <form style="display:inline" method="POST" action="{{ route('mitra.couriers.destroy', $c->id) }}">@csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Add courier</h3>
    <form method="POST" action="{{ route('mitra.couriers.store') }}">
        @csrf
        <div class="mb-3"><input name="name" placeholder="Name" class="form-control"></div>
        <div class="mb-3"><input name="phone" placeholder="Phone" class="form-control"></div>
        <div class="mb-3"><input name="vehicle" placeholder="Vehicle" class="form-control"></div>
        <button class="btn btn-primary">Add</button>
    </form>
</div>
@endsection