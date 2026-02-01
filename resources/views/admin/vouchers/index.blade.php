@extends('admin.layout')

@section('content')
<h1>Vouchers</h1>
<p><a href="{{ route('admin.vouchers.create') }}">Create Voucher</a></p>
@if(session('success'))<div style="color:green">{{ session('success') }}</div>@endif
<table width="100%" border="0" cellpadding="8">
<thead><tr><th>ID</th><th>Code</th><th>Type</th><th>Value</th><th>Used</th><th>Active</th><th>Actions</th></tr></thead>
<tbody>
@foreach($vouchers as $v)
<tr>
  <td>{{ $v->id }}</td>
  <td>{{ $v->code }}</td>
  <td>{{ $v->type }}</td>
  <td>{{ $v->value }}</td>
  <td>{{ $v->used_count }} / {{ $v->usage_limit ?? '-' }}</td>
  <td>{{ $v->is_active ? 'Yes' : 'No' }}</td>
  <td>
    <a href="{{ route('admin.vouchers.edit', $v->id) }}">Edit</a> |
    <form method="POST" action="{{ route('admin.vouchers.toggle', $v->id) }}" style="display:inline">@csrf<button type="submit">Toggle</button></form> |
    <form method="POST" action="{{ route('admin.vouchers.destroy', $v->id) }}" style="display:inline" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')<button type="submit">Delete</button></form>
  </td>
</tr>
@endforeach
</tbody>
</table>
{{ $vouchers->links() }}
@endsection