@extends('admin.layout')

@section('content')
  <h3>Mitra Withdrawals</h3>
  <form method="get" style="margin-bottom:10px">
    <label>Status: <select name="status"><option value="">All</option><option value="pending">Pending</option><option value="processing">Processing</option><option value="success">Success</option><option value="failed">Failed</option></select></label>
    <button type="submit">Filter</button>
  </form>
  <table border="1" cellpadding="6" cellspacing="0" width="100%">
    <thead><tr><th>ID</th><th>Mitra</th><th>Amount</th><th>Status</th><th>Requested At</th><th>Actions</th></tr></thead>
    <tbody>
      @foreach($withdrawals as $wd)
        <tr>
          <td>{{ $wd->id }}</td>
          <td>{{ $wd->mitra->business_name ?? $wd->mitra->user->name ?? 'Mitra #' . $wd->mitra_id }}</td>
          <td>Rp {{ number_format($wd->amount,0,',','.') }}</td>
          <td>{{ $wd->status }}</td>
          <td>{{ $wd->created_at }}</td>
          <td><a href="{{ route('admin.mitra-withdrawals.show', ['id' => $wd->id]) }}">View</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <div style="margin-top:10px">{{ $withdrawals->links() }}</div>
@endsection