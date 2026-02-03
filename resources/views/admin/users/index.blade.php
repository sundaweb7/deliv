@extends('admin.layout')

@section('page-title','Users')

@section('content')
<x-admin.card title="Users">
  @if(session('success'))
    <div class="alert alert-success mb-3">{{ session('success') }}</div>
  @endif
  <div class="d-flex align-items-center justify-content-between mb-4">
    <form method="GET" action="{{ route('admin.users.index') }}">
      <select name="role" onchange="this.form.submit()" class="form-select form-select-sm">
        <option value="">All</option>
        <option value="customer" {{ request('role')=='customer'?'selected':'' }}>Customer</option>
        <option value="mitra" {{ request('role')=='mitra'?'selected':'' }}>Mitra</option>
        <option value="driver" {{ request('role')=='driver'?'selected':'' }}>Driver</option>
        <option value="admin" {{ request('role')=='admin'?'selected':'' }}>Admin</option>
      </select>
    </form>
    <a href="{{ route('admin.users.create') }}"><x-admin.button class="btn-primary btn-sm">Create user</x-admin.button></a>
  </div>

  <x-admin.table>
    <x-slot name="thead">
      <tr><th>ID</th><th>Name</th><th>Email</th><th>Role</th><th>Actions</th></tr>
    </x-slot>

    @foreach($users as $u)
      <tr>
        <td class="py-2">{{ $u->id }}</td>
        <td class="py-2">{{ $u->name }}</td>
        <td class="py-2">{{ $u->email }}</td>
        <td class="py-2">{{ $u->role }}</td>
        <td class="py-2">
          <a href="{{ route('admin.users.edit', $u->id) }}"><x-admin.button variant="muted">Edit</x-admin.button></a>
          <form action="{{ route('admin.users.destroy', $u->id) }}" method="POST" style="display:inline">@csrf @method('DELETE')<button type="submit" class="ml-2"><x-admin.button variant="danger">Delete</x-admin.button></button></form>
        </td>
      </tr>
    @endforeach
  </x-admin.table>

  <x-admin.pagination :paginator="$users" />
</x-admin.card>
@endsection