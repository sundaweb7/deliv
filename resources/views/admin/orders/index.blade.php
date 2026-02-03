@extends('admin.layout')

@section('page-title','Orders')

@section('content')
<x-admin.card title="Orders">
  @if(session('success'))<div class="text-green-600 mb-3">{{ session('success') }}</div>@endif

  <x-admin.table>
    <x-slot name="thead">
      <tr><th>ID</th><th>Customer</th><th>Total</th><th>Payment</th><th>Status</th><th>Actions</th></tr>
    </x-slot>

    @foreach($orders as $o)
      <tr>
        <td class="py-2">{{ $o['id'] }}</td>
        <td class="py-2">{{ $o['customer_id'] }}</td>
        <td class="py-2">{{ number_format($o['grand_total'] ?? 0,0,',','.') }}</td>
        <td class="py-2">{{ $o['payment_method'] ?? '-' }} / {{ $o['payment_status'] ?? '-' }}</td>
        <td class="py-2">{{ $o['status'] }}</td>
        <td class="py-2">
          <a href="{{ route('admin.orders.wa_logs', $o['id']) }}"><x-admin.button variant="muted">WA Logs</x-admin.button></a>
          @if($o['payment_method'] === 'bank_transfer' && $o['payment_status'] !== 'paid')
            <form method="POST" action="{{ route('admin.orders.markPaid', $o['id']) }}" style="display:inline">@csrf<button type="submit" class="ml-2"><x-admin.button variant="primary">Mark Paid</x-admin.button></button></form>
          @endif
        </td>
      </tr>
    @endforeach
  </x-admin.table>
</x-admin.card>
@endsection