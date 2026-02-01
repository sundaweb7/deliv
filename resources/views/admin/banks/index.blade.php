@extends('admin.layout')

@section('content')
<h1>Banks</h1>
<p><a href="{{ route('admin.banks.create') }}">Create bank</a></p>
@if(session('success'))<div style="color:green">{{ session('success') }}</div>@endif
<table width="100%" border="0" cellpadding="8">
<thead><tr><th>ID</th><th>Name</th><th>Account</th><th>Type</th><th>Active</th><th>Actions</th></tr></thead>
<tbody>
@foreach($banks as $b)
<tr>
  <td>{{ $b->id }}</td>
  <td>{{ $b->name }}</td>
  <td>{{ $b->account_name }} / {{ $b->account_number }}</td>
  <td>{{ $b->type }}</td>
  <td>{{ $b->is_active ? 'Yes' : 'No' }}</td>
  <td>
    <a href="{{ route('admin.banks.edit', $b->id) }}">Edit</a> |
    <form method="POST" action="{{ route('admin.banks.destroy', $b->id) }}" style="display:inline" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')<button>Delete</button></form>
  </td>
</tr>
@endforeach
</tbody>
</table>
{{ $banks->links() }}
@endsection