@extends('admin.layout')

@section('content')
<x-admin.card title="Featured">
    <div class="flex items-center justify-between mb-4">
      <h1 class="text-xl font-semibold">Featured Products</h1>
      <a href="{{ route('admin.featured.create') }}"><x-admin.button>Add Featured Product</x-admin.button></a>
    </div>
    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
    <x-admin.table>
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
    </x-admin.table>
</x-admin.card>
@endsection