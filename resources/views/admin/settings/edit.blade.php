@extends('admin.layout')

@section('content')
<h1>Settings</h1>
@if(session('success'))<div style="color:green">{{ session('success') }}</div>@endif
<form method="POST" action="{{ route('admin.settings.update') }}">
  @csrf
  <label>Vendor commission percent</label><br>
  <input name="vendor_commission_percent" type="number" step="0.01" value="{{ old('vendor_commission_percent', $settings->vendor_commission_percent ?? 70) }}"><br>
  <label>Admin delivery cut</label><br>
  <input name="admin_delivery_cut" type="number" step="0.01" value="{{ old('admin_delivery_cut', $settings->admin_delivery_cut ?? 2000) }}"><br>
  <label>Courier share (%)</label><br>
  <input name="courier_share_percent" type="number" step="0.01" value="{{ old('courier_share_percent', $settings->courier_share_percent ?? 0) }}"><br>
  <small>Percent of delivery fee that goes to courier (mitra courier or platform driver)</small><br>
  <label>FCM Server Key</label><br>
  <textarea name="fcm_server_key" rows="4" style="width:100%">{{ old('fcm_server_key', $settings->fcm_server_key ?? '') }}</textarea><br>
  <small>Paste your FCM legacy server key or service account token here for server-side notifications.</small><br>
  <button type="submit">Update</button>
</form>
@endsection