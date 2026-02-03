@extends('admin.layout')

@section('page-title','Vouchers')

@section('content')
<x-admin.card title="Vouchers">
  @if(session('success'))<div class="text-green-600 mb-3">{{ session('success') }}</div>@endif
  <div class="flex justify-end mb-4"><a href="{{ route('admin.vouchers.create') }}"><x-admin.button>Create Voucher</x-admin.button></a></div>

  <x-admin.table>
    <x-slot name="thead">
      <tr><th>ID</th><th>Code</th><th>Type</th><th>Value</th><th>Used</th><th>Active</th><th>Actions</th></tr>
    </x-slot>

    @foreach($vouchers as $v)
      <tr>
        <td class="py-2">{{ $v->id }}</td>
        <td class="py-2">{{ $v->code }}</td>
        <td class="py-2">{{ $v->type }}</td>
        <td class="py-2">{{ $v->value }}</td>
        <td class="py-2">{{ $v->used_count }} / {{ $v->usage_limit ?? '-' }}</td>
        <td class="py-2">{{ $v->is_active ? 'Yes' : 'No' }}</td>
        <td class="py-2">
          <a href="{{ route('admin.vouchers.edit', $v->id) }}"><x-admin.button variant="muted">Edit</x-admin.button></a>
          <form method="POST" action="{{ route('admin.vouchers.toggle', $v->id) }}" style="display:inline">@csrf<button class="ml-2"><x-admin.button variant="muted">Toggle</x-admin.button></button></form>
          <form method="POST" action="{{ route('admin.vouchers.destroy', $v->id) }}" style="display:inline">@csrf @method('DELETE')<button class="ml-2"><x-admin.button variant="danger">Delete</x-admin.button></button></form>
        </td>
      </tr>
    @endforeach
  </x-admin.table>

  <x-admin.pagination :paginator="$vouchers" />
</x-admin.card>
@endsection