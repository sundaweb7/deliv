@extends('admin.layout')

@section('page-title', 'Withdrawal #' . $wd->id)

@section('content')
<x-admin.card :title="'Withdrawal #' . $wd->id">
  @if(session('success')) <div class="text-green-600 mb-3">{{ session('success') }}</div> @endif
  @if(session('error')) <div class="text-red-600 mb-3">{{ session('error') }}</div> @endif

  <table class="w-full text-sm">
    <tbody>
      <tr class="border-t"><th class="text-left py-2 w-48">Mitra</th><td class="py-2">{{ $wd->mitra->business_name ?? $wd->mitra->user->name ?? 'Mitra #' . $wd->mitra_id }}</td></tr>
      <tr class="border-t"><th class="text-left py-2">Amount</th><td class="py-2">Rp {{ number_format($wd->amount,0,',','.') }}</td></tr>
      <tr class="border-t"><th class="text-left py-2">Status</th><td class="py-2">{{ $wd->status }}</td></tr>
      <tr class="border-t"><th class="text-left py-2">Requested At</th><td class="py-2">{{ $wd->created_at }}</td></tr>
      <tr class="border-t"><th class="text-left py-2">Note</th><td class="py-2">{{ $wd->note }}</td></tr>
      <tr class="border-t"><th class="text-left py-2">Bank</th><td class="py-2">{{ $wd->mitra->bank_name ?? '-' }} / {{ $wd->mitra->bank_account_name ?? '-' }} / {{ $wd->mitra->bank_account_number ?? '-' }}</td></tr>
    </tbody>
  </table>

  <div class="mt-4">
    @if($wd->status === 'pending')
      <form method="post" action="{{ route('admin.mitra-withdrawals.approve', ['id' => $wd->id]) }}" style="display:inline">@csrf<button type="submit" class="mr-2"><x-admin.button variant="muted">Approve (Processing)</x-admin.button></button></form>
      <form method="post" action="{{ route('admin.mitra-withdrawals.complete', ['id' => $wd->id]) }}" style="display:inline">@csrf<button type="submit" class="mr-2"><x-admin.button variant="primary">Complete (Success)</x-admin.button></button></form>
      <form method="post" action="{{ route('admin.mitra-withdrawals.reject', ['id' => $wd->id]) }}" style="display:inline">@csrf<button type="submit" onclick="return confirm('Reject and refund?')"><x-admin.button variant="danger">Reject</x-admin.button></button></form>
    @elseif($wd->status === 'processing')
      <form method="post" action="{{ route('admin.mitra-withdrawals.complete', ['id' => $wd->id]) }}" style="display:inline">@csrf<button type="submit" class="mr-2"><x-admin.button variant="primary">Complete (Success)</x-admin.button></button></form>
      <form method="post" action="{{ route('admin.mitra-withdrawals.reject', ['id' => $wd->id]) }}" style="display:inline">@csrf<button type="submit" onclick="return confirm('Reject and refund?')"><x-admin.button variant="danger">Reject</x-admin.button></button></form>
    @endif
  </div>
</x-admin.card>
@endsection