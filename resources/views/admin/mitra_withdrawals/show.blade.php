@extends('admin.layout')

@section('page-title', 'Withdrawal #' . $wd->id)

@section('content')
<x-admin.card :title="'Withdrawal #' . $wd->id">
  @if(session('success')) <div class="alert alert-success mb-3">{{ session('success') }}</div> @endif
  @if(session('error')) <div class="alert alert-danger mb-3">{{ session('error') }}</div> @endif

  <table class="table table-sm">
    <tbody>
      <tr><th class="w-25 text-start">Mitra</th><td>{{ $wd->mitra->business_name ?? $wd->mitra->user->name ?? 'Mitra #' . $wd->mitra_id }}</td></tr>
      <tr><th class="text-start">Amount</th><td>Rp {{ number_format($wd->amount,0,',','.') }}</td></tr>
      <tr><th class="text-start">Status</th><td>{{ $wd->status }}</td></tr>
      <tr><th class="text-start">Requested At</th><td>{{ $wd->created_at }}</td></tr>
      <tr><th class="text-start">Note</th><td>{{ $wd->note }}</td></tr>
      <tr><th class="text-start">Bank</th><td>{{ $wd->mitra->bank_name ?? '-' }} / {{ $wd->mitra->bank_account_name ?? '-' }} / {{ $wd->mitra->bank_account_number ?? '-' }}</td></tr>
    </tbody>
  </table>

  <div class="mt-4">
    @if($wd->status === 'pending')
      <form method="post" action="{{ route('admin.mitra-withdrawals.approve', ['id' => $wd->id]) }}" style="display:inline">@csrf<button type="submit" class="mr-2"><x-admin.button variant="muted" class="btn-sm">Approve (Processing)</x-admin.button></button></form>
      <form method="post" action="{{ route('admin.mitra-withdrawals.complete', ['id' => $wd->id]) }}" style="display:inline">@csrf<button type="submit" class="mr-2"><x-admin.button variant="primary" class="btn-sm">Complete (Success)</x-admin.button></button></form>
      <form method="post" action="{{ route('admin.mitra-withdrawals.reject', ['id' => $wd->id]) }}" style="display:inline">@csrf<button type="submit" onclick="return confirm('Reject and refund?')"><x-admin.button variant="danger" class="btn-sm">Reject</x-admin.button></button></form>
    @elseif($wd->status === 'processing')
      <form method="post" action="{{ route('admin.mitra-withdrawals.complete', ['id' => $wd->id]) }}" style="display:inline">@csrf<button type="submit" class="mr-2"><x-admin.button variant="primary" class="btn-sm">Complete (Success)</x-admin.button></button></form>
      <form method="post" action="{{ route('admin.mitra-withdrawals.reject', ['id' => $wd->id]) }}" style="display:inline">@csrf<button type="submit" onclick="return confirm('Reject and refund?')"><x-admin.button variant="danger" class="btn-sm">Reject</x-admin.button></button></form>
    @endif
  </div>
</x-admin.card>
@endsection