@extends('admin.layout')

@section('page-title','WhatsApp Logs')

@section('content')
<x-admin.card :title="'WhatsApp Logs'">
  @if($orderId)<div class="text-sm text-gray-600 mb-2">for Order #{{ $orderId }}</div>@endif
  @if(session('success'))<div class="text-green-600 mb-3">{{ session('success') }}</div>@endif

  <x-admin.table>
    <x-slot name="thead">
      <tr><th>ID</th><th>Order</th><th>Target</th><th>Message</th><th>Success</th><th>Attempts</th><th>Response</th><th>Created</th><th>Action</th></tr>
    </x-slot>

    @foreach($logs as $l)
      <tr>
        <td class="py-2">{{ $l->id }}</td>
        <td class="py-2">{{ $l->order_id }}</td>
        <td class="py-2">{{ $l->target }}</td>
        <td class="py-2" style="max-width:400px;white-space:pre-wrap">{{ Str::limit($l->message,200) }}</td>
        <td class="py-2">{{ $l->success ? 'Yes' : 'No' }}</td>
        <td class="py-2">{{ $l->attempts }}</td>
        <td class="py-2" style="max-width:300px;white-space:pre-wrap">{{ Str::limit($l->response,200) }}</td>
        <td class="py-2">{{ $l->created_at }}</td>
        <td class="py-2">
          <form method="POST" action="{{ route('admin.wa_logs.resend', $l->id) }}">@csrf<button type="submit"><x-admin.button variant="muted">Resend</x-admin.button></button></form>
        </td>
      </tr>
    @endforeach
  </x-admin.table>

  <x-admin.pagination :paginator="$logs" />
</x-admin.card>
@endsection
