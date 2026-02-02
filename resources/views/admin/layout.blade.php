<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Admin - Deliv</title>
  <style>body{font-family:Arial,Helvetica,sans-serif;max-width:1000px;margin:20px auto;padding:10px} header{display:flex;justify-content:space-between;align-items:center;margin-bottom:20px} nav a{margin-right:12px}</style>
</head>
<body>
  <header>
    <h2>Admin</h2>
    <nav>
      <a href="{{ route('admin.dashboard') }}">Dashboard</a>
      <a href="{{ route('admin.users.index') }}">Users</a>
      <a href="{{ route('admin.mitras.index') }}">Mitras</a>
      <a href="{{ route('admin.drivers.index') }}">Drivers</a>
      <a href="{{ route('admin.products.index') }}">Products</a>
      <a href="{{ route('admin.slides.index') }}">Slides</a>
      <a href="{{ route('admin.vouchers.index') }}">Vouchers</a>
      <a href="{{ route('admin.notifications.index') }}">Notifications</a>
      <a href="{{ route('admin.wa_logs.index') }}">WA Logs @php $failed = \Illuminate\Support\Facades\Schema::hasTable('whatsapp_logs') ? \App\Models\WhatsappLog::where('success',0)->count() : 0; @endphp @if($failed>0) <span style="color:red">({{ $failed }})</span>@endif</a>
      <a href="{{ route('admin.reports.finance') }}">Reports</a>
      <a href="{{ route('admin.settings.edit') }}">Settings</a>
      <a href="{{ route('admin.logout') }}">Logout</a>
    </nav>
  </header>
  <main>
    @yield('content')
  </main>
</body>
</html>