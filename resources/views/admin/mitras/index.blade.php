@extends('admin.layout')

@section('content')
<h1>Manage Mitras</h1>
<p><a href="{{ route('admin.mitras.create') }}">Create new Mitra</a></p>
@if(session('success'))<div style="color:green">{{ session('success') }}</div>@endif
<table width="100%" border="0" cellpadding="8" cellspacing="0">
  <thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Delivery Type</th><th>Active</th><th>Actions</th></tr></thead>
  <tbody>
    @foreach($mitras as $m)
      <tr>
        <td>{{ $m->id }}</td>
        <td>{{ $m->user->name ?? '-' }}</td>
        <td>{{ $m->user->email ?? '-' }}</td>
        <td>{{ $m->delivery_type }}</td>
        <td>{{ $m->is_active ? 'Yes' : 'No' }}</td>
        <td>
          <a href="{{ route('admin.mitras.edit', $m->id) }}">Edit</a> | 
          <form action="{{ route('admin.mitras.toggle', $m->id) }}" method="POST" style="display:inline">
            @csrf
            <button type="submit">Toggle</button>
          </form>
          <form action="{{ route('admin.mitras.destroy', $m->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Delete?')">
            @csrf @method('DELETE')
            <button type="submit">Delete</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
{{ $mitras->links() }}
@endsection