@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Couriers for Mitra: {{ $mitra->user->name }}</h1>

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
                        <form style="display:inline" method="POST" action="{{ route('admin.mitras.couriers.toggle', ['mitra'=>$mitra->id,'id'=>$c->id]) }}">@csrf
                            <button class="btn btn-sm btn-warning">Toggle</button>
                        </form>
                        <form style="display:inline" method="POST" action="{{ route('admin.mitras.couriers.destroy', ['mitra'=>$mitra->id,'id'=>$c->id]) }}">@csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Add courier</h3>
    <form method="POST" action="{{ route('admin.mitras.couriers.store', ['mitra'=>$mitra->id]) }}">
        @csrf
        <div class="mb-3"><input name="name" placeholder="Name" class="form-control"></div>
        <div class="mb-3"><input name="phone" placeholder="Phone" class="form-control"></div>
        <div class="mb-3"><input name="vehicle" placeholder="Vehicle" class="form-control"></div>
        <button class="btn btn-primary">Add</button>
    </form>
</div>
@endsection