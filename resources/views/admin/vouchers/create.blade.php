@extends('admin.layout')

@section('content')
<h1>Create Voucher</h1>
@if($errors->any())<div style="color:red">{{ $errors->first() }}</div>@endif
<form method="POST" action="{{ route('admin.vouchers.store') }}">
  @csrf
  <label>Code</label><br><input name="code" required><br>
  <label>Type</label><br><select name="type"><option value="fixed">Fixed</option><option value="percent">Percent</option></select><br>
  <label>Value</label><br><input name="value" required type="number" step="0.01"><br>
  <label>Usage limit (nullable)</label><br><input name="usage_limit" type="number"><br>
  <label>Min order amount</label><br><input name="min_order_amount" type="number" step="0.01" value="0"><br>
  <label>Starts at</label><br><input name="starts_at" type="datetime-local"><br>
  <label>Expires at</label><br><input name="expires_at" type="datetime-local"><br>
  <label>Active</label><br><select name="is_active"><option value="1">Yes</option><option value="0">No</option></select><br>
  <button type="submit">Create</button>
</form>
@endsection