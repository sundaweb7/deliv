@extends('admin.layout')

@section('content')
<h1>Edit Voucher</h1>
@if($errors->any())<div style="color:red">{{ $errors->first() }}</div>@endif
<form method="POST" action="{{ route('admin.vouchers.update', $v->id) }}">
  @csrf @method('PUT')
  <label>Code</label><br><input name="code" value="{{ old('code', $v->code) }}" required><br>
  <label>Type</label><br><select name="type"><option value="fixed" {{ $v->type=='fixed' ? 'selected':'' }}>Fixed</option><option value="percent" {{ $v->type=='percent' ? 'selected':'' }}>Percent</option></select><br>
  <label>Value</label><br><input name="value" required type="number" step="0.01" value="{{ old('value', $v->value) }}"><br>
  <label>Usage limit (nullable)</label><br><input name="usage_limit" type="number" value="{{ old('usage_limit', $v->usage_limit) }}"><br>
  <label>Min order amount</label><br><input name="min_order_amount" type="number" step="0.01" value="{{ old('min_order_amount', $v->min_order_amount) }}"><br>
  <label>Starts at</label><br><input name="starts_at" type="datetime-local" value="{{ $v->starts_at ? $v->starts_at->format('Y-m-d\TH:i') : '' }}"><br>
  <label>Expires at</label><br><input name="expires_at" type="datetime-local" value="{{ $v->expires_at ? $v->expires_at->format('Y-m-d\TH:i') : '' }}"><br>
  <label>Active</label><br><select name="is_active"><option value="1" {{ $v->is_active ? 'selected':'' }}>Yes</option><option value="0" {{ !$v->is_active ? 'selected':'' }}>No</option></select><br>
  <button type="submit">Update</button>
</form>
@endsection