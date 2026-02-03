@extends('admin.layout')

@section('page-title','Finance Report')

@section('content')
<x-admin.card title="Finance Report">
  <form method="GET" action="{{ route('admin.reports.finance') }}" class="flex gap-2 items-center mb-4">
    <label class="text-sm text-gray-600">From</label>
    <input type="date" name="from" value="{{ $from }}" class="border rounded p-2">
    <label class="text-sm text-gray-600">To</label>
    <input type="date" name="to" value="{{ $to }}" class="border rounded p-2">
    <button type="submit" class="ml-2"><x-admin.button variant="muted">Filter</x-admin.button></button>
    <a href="{{ url('/api/admin/reports/finance?export=csv') }}" class="ml-4 text-sm text-emerald-600">Export CSV</a>
  </form>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div class="bg-white shadow rounded p-4">
      <div class="text-sm text-gray-500">Orders</div>
      <div class="text-2xl font-semibold">{{ $data['totals']['orders'] ?? 0 }}</div>
      <div class="text-sm text-gray-600 mt-2">Total Revenue: {{ number_format($data['totals']['total_revenue'] ?? 0,0,',','.') }}</div>
      <div class="text-sm text-gray-600">Total Food: {{ number_format($data['totals']['total_food'] ?? 0,0,',','.') }}</div>
    </div>
    <div class="bg-white shadow rounded p-4">
      <div class="text-sm text-gray-500">Admin Profit</div>
      <div class="text-2xl font-semibold">{{ number_format($data['totals']['admin_profit'] ?? 0,0,',','.') }}</div>
      <div class="text-sm text-gray-600 mt-2">Total Delivery: {{ number_format($data['totals']['total_delivery'] ?? 0,0,',','.') }}</div>
    </div>
  </div>
</x-admin.card>

<x-admin.card title="Daily Orders">
  <x-admin.table>
    <x-slot name="thead">
      <tr><th>Date</th><th>Orders</th><th>Revenue</th></tr>
    </x-slot>
    @foreach($data['daily'] ?? [] as $d)
      <tr>
        <td class="py-2">{{ $d->date }}</td>
        <td class="py-2">{{ $d->orders }}</td>
        <td class="py-2">{{ number_format($d->revenue,0,',','.') }}</td>
      </tr>
    @endforeach
  </x-admin.table>
</x-admin.card>

<x-admin.card title="Pendapatan Per Mitra">
  <x-admin.table>
    <x-slot name="thead">
      <tr><th>Mitra</th><th>Revenue</th><th>Delivery Fee</th></tr>
    </x-slot>
    @foreach($data['mitra_earnings'] ?? [] as $m)
      @php
        $mitraObj = is_array($m) ? ($m['mitra'] ?? null) : ($m->mitra ?? null);
        $mitraName = null;
        if ($mitraObj) {
          if (is_array($mitraObj)) $mitraName = $mitraObj['user']['name'] ?? ('Mitra #'.$m['mitra_id'] ?? $m->mitra_id ?? '');
          else $mitraName = $mitraObj->user->name ?? ('Mitra #'.($m['mitra_id'] ?? $m->mitra_id ?? ''));
        }
        $revenue = is_array($m) ? ($m['revenue'] ?? 0) : ($m->revenue ?? 0);
        $deliveryFee = is_array($m) ? ($m['delivery_fee'] ?? 0) : ($m->delivery_fee ?? 0);
      @endphp
      <tr>
        <td class="py-2">{{ $mitraName ?? ('Mitra #'.(is_array($m) ? ($m['mitra_id'] ?? '') : ($m->mitra_id ?? ''))) }}</td>
        <td class="py-2">{{ number_format($revenue,0,',','.') }}</td>
        <td class="py-2">{{ number_format($deliveryFee ?? 0,0,',','.') }}</td>
      </tr>
    @endforeach
  </x-admin.table>
  @if(isset($data['mitra_earnings']))
    {{ $data['mitra_earnings']->links() }}
  @endif
</x-admin.card>

<x-admin.card title="Transactions Summary">
  <ul>
    @foreach($data['transactions'] ?? [] as $t)
      <li>{{ $t->type }}: {{ number_format($t->total,0,',','.') }}</li>
    @endforeach
  </ul>
</x-admin.card>
@endsection