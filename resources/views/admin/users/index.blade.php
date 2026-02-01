@extends('admin.layout')

@section('content')
<h1>Users</h1>
@if(session('success'))<div style="color:green">{{ session('success') }}</div>@endif
<form method="GET" action="{{ route('admin.users.index') }}">
  <label>Role filter</label>
  <select name="role" onchange="this.form.submit()"><option value="">All</option><option value="customer" {{ request('role')=='customer'?'selected':'' }}>Customer</option><option value="mitra" {{ request('role')=='mitra'?'selected':'' }}>Mitra</option><option value="driver" {{ request('role')=='driver'?'selected':'' }}>Driver</option><option value="admin" {{ request('role')=='admin'?'selected':'' }}>Admin</option></select>
</form>
<table width="100%" border="0" cellpadding="8">
<thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Role</th><th>Actions</th></tr></thead>
<tbody>
@foreach($users as $u)
<tr>
  <td>{{ $u->id }}</td>
  <td>{{ $u->name }}</td>
  <td>{{ $u->email }}</td>
  <td>{{ $u->role }}</td>
  <td>
    <form action="{{ route('admin.users.destroy', $u->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')<button type="submit">Delete</button></form>
  </td>
</tr>
@endforeach
</tbody>
</table>
{{ $users->links() }}
@endsection