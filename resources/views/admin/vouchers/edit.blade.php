@extends('admin.layout')

@section('page-title','Edit Voucher')

@section('content')
<x-admin.card :title="'Edit Voucher - ' . ($v->code ?? '')">
  @if($errors->any())<div class="text-red-600 mb-3">{{ $errors->first() }}</div>@endif
  <form method="POST" action="{{ route('admin.vouchers.update', $v->id) }}" class="space-y-3">
    @csrf @method('PUT')
    <div>
      <label class="text-sm text-gray-600">Code</label>
      <input name="code" value="{{ old('code', $v->code) }}" required class="mt-1 block w-full border rounded p-2">
    </div>

    <div>
      <label class="text-sm text-gray-600">Type</label>
      <select name="type" class="mt-1 block w-full border rounded p-2"><option value="fixed" {{ $v->type=='fixed' ? 'selected':'' }}>Fixed</option><option value="percent" {{ $v->type=='percent' ? 'selected':'' }}>Percent</option></select>
    </div>

    <div>
      <label class="text-sm text-gray-600">Value</label>
      <input name="value" required type="number" step="0.01" value="{{ old('value', $v->value) }}" class="mt-1 block w-full border rounded p-2">
    </div>

    <div>
      <label class="text-sm text-gray-600">Usage limit (nullable)</label>
      <input name="usage_limit" type="number" value="{{ old('usage_limit', $v->usage_limit) }}" class="mt-1 block w-full border rounded p-2">
    </div>

    <div>
      <label class="text-sm text-gray-600">Min order amount</label>
      <input name="min_order_amount" type="number" step="0.01" value="{{ old('min_order_amount', $v->min_order_amount) }}" class="mt-1 block w-full border rounded p-2">
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
      <div>
        <label class="text-sm text-gray-600">Starts at</label>
        <input name="starts_at" type="datetime-local" class="mt-1 block w-full border rounded p-2" value="{{ $v->starts_at ? $v->starts_at->format('Y-m-d\TH:i') : '' }}">
      </div>
      <div>
        <label class="text-sm text-gray-600">Expires at</label>
        <input name="expires_at" type="datetime-local" class="mt-1 block w-full border rounded p-2" value="{{ $v->expires_at ? $v->expires_at->format('Y-m-d\TH:i') : '' }}">
      </div>
    </div>

    <div>
      <label class="text-sm text-gray-600">Active</label>
      <select name="is_active" class="mt-1 block w-full border rounded p-2"><option value="1" {{ $v->is_active ? 'selected':'' }}>Yes</option><option value="0" {{ !$v->is_active ? 'selected':'' }}>No</option></select>
    </div>

    <div class="flex justify-end">
      <x-admin.button>Update</x-admin.button>
    </div>
  </form>
</x-admin.card>
@endsection