@extends('admin.layout')

@section('page-title','Categories')

@section('content')
<x-admin.card title="Categories">
  @if(session('success'))<div class="text-green-600 mb-3">{{ session('success') }}</div>@endif
  <div class="flex justify-end mb-4"><a href="{{ route('admin.categories.create') }}"><x-admin.button>Create Category</x-admin.button></a></div>

  <x-admin.table>
    <x-slot name="thead">
      <tr><th>#</th><th>Icon</th><th>Name</th><th>Order</th><th>Actions</th></tr>
    </x-slot>

    @foreach($categories as $cat)
      <tr>
        <td class="py-2">{{ $cat->id }}</td>
        <td class="py-2">@if($cat->icon)<img src="{{ asset('storage/categories/thumb/' . $cat->icon) }}" style="height:48px" alt="icon">@endif</td>
        <td class="py-2">{{ $cat->name }}</td>
        <td class="py-2">{{ $cat->order }}</td>
        <td class="py-2">
          <a href="{{ route('admin.categories.edit', $cat->id) }}"><x-admin.button variant="muted">Edit</x-admin.button></a>
          <form action="{{ route('admin.categories.destroy', $cat->id) }}" method="POST" style="display:inline">@csrf @method('DELETE')<button type="submit" class="ml-2"><x-admin.button variant="danger">Delete</x-admin.button></button></form>
        </td>
      </tr>
    @endforeach
  </x-admin.table>

  <x-admin.pagination :paginator="$categories" />
</x-admin.card>
@endsection
