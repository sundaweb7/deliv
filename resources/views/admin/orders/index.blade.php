@extends('admin.layout')

@section('content')
<h1>Orders</h1>
@if(session('success'))<div style="color:green">{{ session('success') }}</div>@endif
<table width="100%" border="0" cellpadding="8">
<thead><tr><th>ID</th><th>Customer</th><th>Total</th><th>Payment</th><th>Status</th><th>Actions</th></tr></thead>
<tbody>
@foreach($orders as $o)
<tr>
  <td>{{ $o['id'] }}</td>
  <td>{{ $o['customer_id'] }}</td>
  <td>{{ number_format($o['grand_total'] ?? 0,0,',','.') }}</td>
  <td>{{ $o['payment_method'] ?? '-' }} / {{ $o['payment_status'] ?? '-' }}</td>
  <td>{{ $o['status'] }}</td>
  <td>
    <a href="{{ route('admin.orders.wa_logs', $o['id']) }}">WA Logs</a>
    @if($o['payment_method'] === 'bank_transfer' && $o['payment_status'] !== 'paid')
      <form method="POST" action="{{ route('admin.orders.markPaid', $o['id']) }}">@csrf<button type="submit">Mark Paid</button></form>
    @endif
  </td>
</tr>
@endforeach
</tbody>
</table>
@endsection