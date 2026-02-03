@extends('admin.layout')

@section('page-title','Banks')

@section('content')
<x-admin.card title="Banks">
  @if(session('success'))<div class="text-green-600 mb-3">{{ session('success') }}</div>@endif
  <div class="flex justify-end mb-4"><a href="{{ route('admin.banks.create') }}"><x-admin.button>Create bank</x-admin.button></a></div>

  <x-admin.table>
    <x-slot name="thead">
      <tr><th>ID</th><th>Name</th><th>Account</th><th>Type</th><th>Active</th><th>Actions</th></tr>
    </x-slot>

    @foreach($banks as $b)
      <tr>
        <td class="py-2">{{ $b->id }}</td>
        <td class="py-2">{{ $b->name }}</td>
        <td class="py-2">{{ $b->account_name }} / {{ $b->account_number }}</td>
        <td class="py-2">{{ $b->type }}</td>
        <td class="py-2">{{ $b->is_active ? 'Yes' : 'No' }}</td>
        <td class="py-2">
          <a href="{{ route('admin.banks.edit', $b->id) }}"><x-admin.button variant="muted">Edit</x-admin.button></a>
          <form method="POST" action="{{ route('admin.banks.destroy', $b->id) }}" style="display:inline">@csrf @method('DELETE')<button type="submit" class="ml-2"><x-admin.button variant="danger">Delete</x-admin.button></button></form>
        </td>
      </tr>
    @endforeach
  </x-admin.table>

  <x-admin.pagination :paginator="$banks" />
</x-admin.card>
@endsection