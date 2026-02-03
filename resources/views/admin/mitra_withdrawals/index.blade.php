@extends('admin.layout')

@section('page-title','Mitra Withdrawals')

@section('content')
<x-admin.card title="Mitra Withdrawals">
  <form method="get" class="mb-4 flex items-center gap-2">
    <label class="text-sm text-gray-600">Status</label>
    <select name="status" class="border rounded p-2 text-sm"><option value="">All</option><option value="pending">Pending</option><option value="processing">Processing</option><option value="success">Success</option><option value="failed">Failed</option></select>
    <button type="submit" class="ml-2"><x-admin.button variant="muted">Filter</x-admin.button></button>
  </form>

  <x-admin.table>
    <x-slot name="thead">
      <tr><th>ID</th><th>Mitra</th><th>Amount</th><th>Status</th><th>Requested At</th><th>Actions</th></tr>
    </x-slot>
    @foreach($withdrawals as $wd)
      <tr>
        <td class="py-2">{{ $wd->id }}</td>
        <td class="py-2">{{ $wd->mitra->business_name ?? $wd->mitra->user->name ?? 'Mitra #' . $wd->mitra_id }}</td>
        <td class="py-2">Rp {{ number_format($wd->amount,0,',','.') }}</td>
        <td class="py-2">{{ $wd->status }}</td>
        <td class="py-2">{{ $wd->created_at }}</td>
        <td class="py-2"><a href="{{ route('admin.mitra-withdrawals.show', ['id' => $wd->id]) }}"><x-admin.button variant="muted">View</x-admin.button></a></td>
      </tr>
    @endforeach
  </x-admin.table>

  <x-admin.pagination :paginator="$withdrawals" />
</x-admin.card>
@endsection