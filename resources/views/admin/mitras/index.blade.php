@extends('admin.layout')

@section('page-title','Mitras')

@section('content')
<x-admin.card title="Manage Mitras">
  @if(session('success'))<div class="text-green-600 mb-3">{{ session('success') }}</div>@endif
  <div class="flex justify-end mb-4">
    <a href="{{ route('admin.mitras.create') }}"><x-admin.button>Create new Mitra</x-admin.button></a>
  </div>

  <x-admin.table>
    <x-slot name="thead">
      <tr><th>ID</th><th>Name</th><th>Email</th><th>Delivery Type</th><th>Active</th><th>Actions</th></tr>
    </x-slot>

    @foreach($mitras as $m)
      <tr>
        <td class="py-2">{{ $m->id }}</td>
        <td class="py-2">{{ $m->user->name ?? '-' }}</td>
        <td class="py-2">{{ $m->user->email ?? '-' }}</td>
        <td class="py-2">{{ $m->delivery_type }}</td>
        <td class="py-2">{{ $m->is_active ? 'Yes' : 'No' }}</td>
        <td class="py-2">
          <a href="{{ route('admin.mitras.edit', $m->id) }}"><x-admin.button variant="muted">Edit</x-admin.button></a>
          <form action="{{ route('admin.mitras.toggle', $m->id) }}" method="POST" style="display:inline">@csrf<button type="submit" class="ml-2"><x-admin.button variant="muted">Toggle</x-admin.button></button></form>
          <form action="{{ route('admin.mitras.destroy', $m->id) }}" method="POST" style="display:inline">@csrf @method('DELETE')<button type="submit" class="ml-2"><x-admin.button variant="danger">Delete</x-admin.button></button></form>
        </td>
      </tr>
    @endforeach
  </x-admin.table>

  <x-admin.pagination :paginator="$mitras" />
</x-admin.card>
@endsection