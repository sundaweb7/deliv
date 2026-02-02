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

  <h3>WhatsApp settings</h3>
  <label>WhatsApp Provider</label><br>
  <select name="wa_provider">
    <option value="none" {{ old('wa_provider', $settings->wa_provider ?? 'none') == 'none' ? 'selected' : '' }}>None</option>
    <option value="fontee" {{ old('wa_provider', $settings->wa_provider ?? '') == 'fontee' ? 'selected' : '' }}>Fontee</option>
  </select><br>
  <label>WhatsApp API Key</label><br>
  <input name="wa_api_key" type="text" value="{{ old('wa_api_key', $settings->wa_api_key ?? '') }}"><br>
  <label>WhatsApp Device ID</label><br>
  <input name="wa_device_id" type="text" value="{{ old('wa_device_id', $settings->wa_device_id ?? '') }}"><br>
  <label>WhatsApp API URL (optional)</label><br>
  <input name="wa_api_url" type="text" value="{{ old('wa_api_url', $settings->wa_api_url ?? '') }}"><br>
  <label>Enable WhatsApp notifications</label>
  <input type="checkbox" name="wa_enabled" value="1" {{ old('wa_enabled', $settings->wa_enabled ?? true) ? 'checked' : '' }}><br>
  <label>Send to Mitra</label>
  <input type="checkbox" name="wa_send_to_mitra" value="1" {{ old('wa_send_to_mitra', $settings->wa_send_to_mitra ?? true) ? 'checked' : '' }}><br>
  <label>Send to Customer</label>
  <input type="checkbox" name="wa_send_to_customer" value="1" {{ old('wa_send_to_customer', $settings->wa_send_to_customer ?? true) ? 'checked' : '' }}><br>

  <button type="submit">Update</button>
</form>

<hr>
<h4>Test WhatsApp connection / send test message</h4>
<label>Test phone (use local 08/62/+62 format)</label><br>
<input id="wa-test-phone" type="text" placeholder="081234..." style="width:300px"><br>
<label>Message</label><br>
<textarea id="wa-test-message" rows="3" style="width:400px">Tes koneksi WhatsApp dari Deliv (admin test)</textarea><br>
<button id="wa-test-connection-btn" type="button">Test API Key (ping)</button>
<button id="wa-send-test-btn" type="button">Send test message</button>
<div id="wa-test-result" style="margin-top:10px; font-weight:bold;"></div>

<script>
  const csrfToken = '{{ csrf_token() }}';
  function showWaResult(msg, ok) {
    const el = document.getElementById('wa-test-result');
    el.innerText = (typeof msg === 'string') ? msg : JSON.stringify(msg);
    el.style.color = ok ? 'green' : 'red';
  }

  document.getElementById('wa-test-connection-btn').addEventListener('click', function(e) {
    const btn = this; btn.disabled = true; showWaResult('Checking...', true);
    fetch('{{ route('admin.settings.testWaConnection') }}', {
      method: 'POST',
      credentials: 'same-origin',
      headers: {'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken},
      body: JSON.stringify({})
    }).then(r => {
      if (!r.ok) return r.text().then(t => { throw new Error(t || ('HTTP ' + r.status)); });
      return r.json();
    }).then(data => {
      showWaResult(data.message || data, data.ok || data.success === true);
      btn.disabled = false;
    }).catch(err => { showWaResult(err.message || JSON.stringify(err), false); btn.disabled = false; });
  });

  document.getElementById('wa-send-test-btn').addEventListener('click', function(e) {
    const btn = this; btn.disabled = true; showWaResult('Sending...', true);
    const phone = document.getElementById('wa-test-phone').value;
    const message = document.getElementById('wa-test-message').value;
    fetch('{{ route('admin.settings.sendTestWa') }}', {
      method: 'POST',
      credentials: 'same-origin',
      headers: {'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken},
      body: JSON.stringify({test_phone: phone, test_message: message})
    }).then(r => {
      if (!r.ok) return r.text().then(t => { throw new Error(t || ('HTTP ' + r.status)); });
      return r.json();
    }).then(data => {
      if (data.success === true) showWaResult('Sent OK (HTTP ' + (data.status ?? '') + ') - ' + (data.body ?? ''), true);
      else showWaResult(data.error || JSON.stringify(data), false);
      btn.disabled = false;
    }).catch(err => { showWaResult(err.message || JSON.stringify(err), false); btn.disabled = false; });
  });
</script>

@endsection