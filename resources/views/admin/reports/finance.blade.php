@extends('admin.layout')

@section('content')
<h1>Finance Report</h1>
<form method="GET" action="{{ route('admin.reports.finance') }}">
  <label>From</label> <input type="date" name="from" value="{{ $from }}"> <label>To</label> <input type="date" name="to" value="{{ $to }}"> <button type="submit">Filter</button>
  <a href="{{ url('/api/admin/reports/finance?export=csv') }}">Export CSV</a>
</form>

<div style="margin-top:12px">
  <h3>Totals</h3>
  <p>Orders: {{ $data['totals']['orders'] ?? 0 }}</p>
  <p>Total Revenue: {{ number_format($data['totals']['total_revenue'] ?? 0,0,',','.') }}</p>
  <p>Total Food: {{ number_format($data['totals']['total_food'] ?? 0,0,',','.') }}</p>
  <p>Total Delivery: {{ number_format($data['totals']['total_delivery'] ?? 0,0,',','.') }}</p>
  <p>Admin Profit: {{ number_format($data['totals']['admin_profit'] ?? 0,0,',','.') }}</p>
</div>

<div style="margin-top:12px">
  <h3>Top Mitra</h3>
  <ul>
    @foreach($data['top_mitra'] ?? [] as $m)
      <li>{{ $m->mitra->user->name ?? 'Mitra #'.$m->mitra_id }} — {{ number_format($m->revenue,0,',','.') }}</li>
    @endforeach
  </ul>
</div>

<div style="margin-top:12px">
  <h3>Daily Orders</h3>
  <table border="0" cellpadding="6" width="100%">
    <thead><tr><th>Date</th><th>Orders</th><th>Revenue</th></tr></thead>
    <tbody>
      @foreach($data['daily'] ?? [] as $d)
      <tr>
        <td>{{ $d->date }}</td>
        <td>{{ $d->orders }}</td>
        <td>{{ number_format($d->revenue,0,',','.') }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div style="margin-top:12px">
  <h3>Pendapatan Per Mitra</h3>
  <table border="0" cellpadding="6" width="100%">
    <thead><tr><th>Mitra</th><th>Revenue</th><th>Delivery Fee</th></tr></thead>
    <tbody>
      @foreach($data['mitra_earnings'] ?? [] as $m)
      <tr>
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
        <td>{{ $mitraName ?? ('Mitra #'.(is_array($m) ? ($m['mitra_id'] ?? '') : ($m->mitra_id ?? ''))) }}</td>
        <td>{{ number_format($revenue,0,',','.') }}</td>
        <td>{{ number_format($deliveryFee ?? 0,0,',','.') }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @if(isset($data['mitra_earnings']))
    {{ $data['mitra_earnings']->links() }}
  @endif
</div>

<div style="margin-top:12px">
  <h3>Transactions Summary</h3>
  <ul>
    @foreach($data['transactions'] ?? [] as $t)
      <li>{{ $t->type }}: {{ number_format($t->total,0,',','.') }}</li>
    @endforeach
  </ul>
</div>
@endsection