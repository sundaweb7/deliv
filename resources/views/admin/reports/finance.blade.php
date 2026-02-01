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
  <h3>Transactions Summary</h3>
  <ul>
    @foreach($data['transactions'] ?? [] as $t)
      <li>{{ $t->type }}: {{ number_format($t->total,0,',','.') }}</li>
    @endforeach
  </ul>
</div>
@endsection