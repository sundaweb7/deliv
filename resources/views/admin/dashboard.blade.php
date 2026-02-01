<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Admin Dashboard - Deliv</title>
  <style>body{font-family:Arial,Helvetica,sans-serif;max-width:900px;margin:40px auto} .card{border:1px solid #ddd;padding:16px;margin-bottom:12px;border-radius:6px}</style>
</head>
<body>
  <h1>Admin Dashboard</h1>
  <p><a href="{{ route('admin.logout') }}">Logout</a></p>

  <div class="card">
    <h3>Users</h3>
    <p>Total: {{ $data['users']['total'] ?? 0 }} — Customers: {{ $data['users']['customers'] ?? 0 }} — Mitras: {{ $data['users']['mitras'] ?? 0 }} — Drivers: {{ $data['users']['drivers'] ?? 0 }}</p>
    <p><a href="{{ route('admin.users.index') }}">View users list</a></p>
  </div>

  <div class="card">
    <h3>Orders</h3>
    <p>Total: {{ $data['orders']['total'] ?? 0 }} — Pending: {{ $data['orders']['pending'] ?? 0 }}</p>
  </div>

  <div class="card">
    <h3>Finance</h3>
    <p>Total Revenue: {{ number_format($data['finance']['total_revenue'] ?? 0, 0, ',', '.') }} — Admin Commission: {{ number_format($data['finance']['admin_commission'] ?? 0, 0, ',', '.') }}</p>
  </div>

  <div class="card">
    <h3>Quick Links</h3>
    <ul>
      <li><a href="/admin/mitras">UI: Manage Mitras</a></li>
      <li><a href="/admin/drivers">UI: Manage Drivers</a></li>
      <li><a href="/admin/products">UI: Manage Products</a></li>
      <li><a href="/api/admin/mitras">API: Manage Mitras</a> (use Postman)</li>
      <li><a href="/api/admin/stats">API: Raw stats JSON</a></li>
    </ul>
  </div>
</body>
</html>