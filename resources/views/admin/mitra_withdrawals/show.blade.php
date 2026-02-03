@extends('admin.layout')

@section('content')
  <h3>Withdrawal #{{ $wd->id }}</h3>
  @if(session('success')) <div style="color:green">{{ session('success') }}</div> @endif
  @if(session('error')) <div style="color:red">{{ session('error') }}</div> @endif
  <table>
    <tr><th>Mitra</th><td>{{ $wd->mitra->business_name ?? $wd->mitra->user->name ?? 'Mitra #' . $wd->mitra_id }}</td></tr>
    <tr><th>Amount</th><td>Rp {{ number_format($wd->amount,0,',','.') }}</td></tr>
    <tr><th>Status</th><td>{{ $wd->status }}</td></tr>
    <tr><th>Requested At</th><td>{{ $wd->created_at }}</td></tr>
    <tr><th>Note</th><td>{{ $wd->note }}</td></tr>
    <tr><th>Bank</th><td>{{ $wd->mitra->bank_name ?? '-' }} / {{ $wd->mitra->bank_account_name ?? '-' }} / {{ $wd->mitra->bank_account_number ?? '-' }}</td></tr>
  </table>

  <div style="margin-top:10px">
    @if($wd->status === 'pending')
      <form method="post" action="{{ route('admin.mitra-withdrawals.approve', ['id' => $wd->id]) }}" style="display:inline">@csrf<button type="submit">Approve (Processing)</button></form>
      <form method="post" action="{{ route('admin.mitra-withdrawals.complete', ['id' => $wd->id]) }}" style="display:inline">@csrf<button type="submit">Complete (Success)</button></form>
      <form method="post" action="{{ route('admin.mitra-withdrawals.reject', ['id' => $wd->id]) }}" style="display:inline">@csrf<button type="submit" onclick="return confirm('Reject and refund?')">Reject</button></form>
    @elseif($wd->status === 'processing')
      <form method="post" action="{{ route('admin.mitra-withdrawals.complete', ['id' => $wd->id]) }}" style="display:inline">@csrf<button type="submit">Complete (Success)</button></form>
      <form method="post" action="{{ route('admin.mitra-withdrawals.reject', ['id' => $wd->id]) }}" style="display:inline">@csrf<button type="submit" onclick="return confirm('Reject and refund?')">Reject</button></form>
    @else
      <!-- no actions -->
    @endif
  </div>

@endsection