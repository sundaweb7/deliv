@extends('admin.layout')

@section('content')
<h1>Drivers</h1>
@if(session('success'))<div style="color:green">{{ session('success') }}</div>@endif
<table width="100%" border="0" cellpadding="8">
  <thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Online</th><th>Actions</th></tr></thead>
  <tbody>
    @foreach($drivers as $d)
    <tr>
      <td>{{ $d->id }}</td>
      <td>{{ $d->user->name ?? '-' }}</td>
      <td>{{ $d->user->email ?? '-' }}</td>
      <td>{{ $d->is_online ? 'Online' : 'Offline' }}</td>
      <td>
        <form action="{{ route('admin.drivers.toggle', $d->id) }}" method="POST" style="display:inline">@csrf<button type="submit">Toggle</button></form>
        <form action="{{ route('admin.drivers.destroy', $d->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')<button type="submit">Delete</button></form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $drivers->links() }}
@endsection