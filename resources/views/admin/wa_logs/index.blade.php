@extends('admin.layout')

@section('content')
<h1>WhatsApp Logs @if($orderId) for Order #{{ $orderId }} @endif</h1>
@if(session('success'))<div style="color:green">{{ session('success') }}</div>@endif
<table width="100%" border="0" cellpadding="8">
<thead><tr><th>ID</th><th>Order</th><th>Target</th><th>Message</th><th>Success</th><th>Attempts</th><th>Response</th><th>Created</th><th>Action</th></tr></thead>
<tbody>
@foreach($logs as $l)
<tr>
  <td>{{ $l->id }}</td>
  <td>{{ $l->order_id }}</td>
  <td>{{ $l->target }}</td>
  <td style="max-width:400px;white-space:pre-wrap;">{{ Str::limit($l->message, 200) }}</td>
  <td>{{ $l->success ? 'Yes' : 'No' }}</td>
  <td>{{ $l->attempts }}</td>
  <td style="max-width:300px;white-space:pre-wrap;">{{ Str::limit($l->response, 200) }}</td>
  <td>{{ $l->created_at }}</td>
  <td>
    <form method="POST" action="{{ route('admin.wa_logs.resend', $l->id) }}">@csrf<button type="submit">Resend</button></form>
  </td>
</tr>
@endforeach
</tbody>
</table>

{{ $logs->links() }}
@endsection
