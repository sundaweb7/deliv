@extends('admin.layout')

@section('page-title','Create Voucher')

@section('content')
<x-admin.card title="Create Voucher">
  @if($errors->any())<div class="text-red-600 mb-3">{{ $errors->first() }}</div>@endif
  <form method="POST" action="{{ route('admin.vouchers.store') }}" class="space-y-3">
    @csrf
    <div>
      <label class="text-sm text-gray-600">Code</label>
      <input name="code" required class="mt-1 block w-full border rounded p-2">
    </div>

    <div>
      <label class="text-sm text-gray-600">Type</label>
      <select name="type" class="mt-1 block w-full border rounded p-2"><option value="fixed">Fixed</option><option value="percent">Percent</option></select>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
      <div>
        <label class="text-sm text-gray-600">Value</label>
        <input name="value" required type="number" step="0.01" class="mt-1 block w-full border rounded p-2">
      </div>
      <div>
        <label class="text-sm text-gray-600">Usage limit (nullable)</label>
        <input name="usage_limit" type="number" class="mt-1 block w-full border rounded p-2">
      </div>
    </div>

    <div>
      <label class="text-sm text-gray-600">Min order amount</label>
      <input name="min_order_amount" type="number" step="0.01" value="0" class="mt-1 block w-full border rounded p-2">
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
      <div>
        <label class="text-sm text-gray-600">Starts at</label>
        <input name="starts_at" type="datetime-local" class="mt-1 block w-full border rounded p-2">
      </div>
      <div>
        <label class="text-sm text-gray-600">Expires at</label>
        <input name="expires_at" type="datetime-local" class="mt-1 block w-full border rounded p-2">
      </div>
    </div>

    <div>
      <label class="text-sm text-gray-600">Active</label>
      <select name="is_active" class="mt-1 block w-full border rounded p-2"><option value="1">Yes</option><option value="0">No</option></select>
    </div>

    <div class="flex justify-end">
      <x-admin.button>Create</x-admin.button>
    </div>
  </form>
</x-admin.card>
@endsection