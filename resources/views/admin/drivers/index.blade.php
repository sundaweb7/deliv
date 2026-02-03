@extends('admin.layout')

@section('page-title','Drivers')

@section('content')
<x-admin.card title="Drivers">
  @if(session('success'))<div class="text-green-600 mb-3">{{ session('success') }}</div>@endif

  <x-admin.table>
    <x-slot name="thead">
      <tr><th>ID</th><th>Name</th><th>Email</th><th>Online</th><th>Actions</th></tr>
    </x-slot>
    @foreach($drivers as $d)
      <tr>
        <td class="py-2">{{ $d->id }}</td>
        <td class="py-2">{{ $d->user->name ?? '-' }}</td>
        <td class="py-2">{{ $d->user->email ?? '-' }}</td>
        <td class="py-2">{{ $d->is_online ? 'Online' : 'Offline' }}</td>
        <td class="py-2">
          <form action="{{ route('admin.drivers.toggle', $d->id) }}" method="POST" style="display:inline">@csrf<button type="submit"><x-admin.button variant="muted">Toggle</x-admin.button></button></form>
          <form action="{{ route('admin.drivers.destroy', $d->id) }}" method="POST" style="display:inline">@csrf @method('DELETE')<button type="submit" class="ml-2"><x-admin.button variant="danger">Delete</x-admin.button></button></form>
        </td>
      </tr>
    @endforeach
  </x-admin.table>

  <x-admin.pagination :paginator="$drivers" />
</x-admin.card>
@endsection