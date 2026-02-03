<aside class="w-64 bg-white shadow-md h-screen sticky top-0 hidden md:block">
  <div class="p-4 border-b">
    <a href="{{ route('admin.dashboard') }}" class="text-lg font-semibold">Deliv Admin</a>
  </div>
  <nav class="p-4">
    <ul class="space-y-1">
      <li><a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 p-2 rounded hover:bg-gray-100 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-100 font-semibold' : '' }}">🏠 Dashboard</a></li>
      <li><a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 p-2 rounded hover:bg-gray-100 {{ request()->routeIs('admin.users.*') ? 'bg-gray-100 font-semibold' : '' }}">👥 Users</a></li>
      <li><a href="{{ route('admin.mitras.index') }}" class="flex items-center gap-3 p-2 rounded hover:bg-gray-100 {{ request()->routeIs('admin.mitras.*') ? 'bg-gray-100 font-semibold' : '' }}">🏬 Mitras</a></li>
      <li><a href="{{ route('admin.products.index') }}" class="flex items-center gap-3 p-2 rounded hover:bg-gray-100 {{ request()->routeIs('admin.products.*') ? 'bg-gray-100 font-semibold' : '' }}">📦 Products</a></li>
      <li><a href="{{ route('admin.categories.index') }}" class="flex items-center gap-3 p-2 rounded hover:bg-gray-100 {{ request()->routeIs('admin.categories.*') ? 'bg-gray-100 font-semibold' : '' }}">🗂️ Categories</a></li>
      <li><a href="{{ route('admin.slides.index') }}" class="flex items-center gap-3 p-2 rounded hover:bg-gray-100 {{ request()->routeIs('admin.slides.*') ? 'bg-gray-100 font-semibold' : '' }}">🖼️ Slides</a></li>
      <li><a href="{{ route('admin.vouchers.index') }}" class="flex items-center gap-3 p-2 rounded hover:bg-gray-100 {{ request()->routeIs('admin.vouchers.*') ? 'bg-gray-100 font-semibold' : '' }}">🎟️ Vouchers</a></li>
      <li><a href="{{ route('admin.notifications.index') }}" class="flex items-center gap-3 p-2 rounded hover:bg-gray-100 {{ request()->routeIs('admin.notifications.*') ? 'bg-gray-100 font-semibold' : '' }}">🔔 Notifications</a></li>
      <li><a href="{{ route('admin.mitra-withdrawals.index') }}" class="flex items-center gap-3 p-2 rounded hover:bg-gray-100 {{ request()->routeIs('admin.mitra-withdrawals.*') ? 'bg-gray-100 font-semibold' : '' }}">💸 Withdrawals</a></li>
      <li><a href="{{ route('admin.whatsapp-templates.index') }}" class="flex items-center gap-3 p-2 rounded hover:bg-gray-100 {{ request()->routeIs('admin.whatsapp-templates.*') ? 'bg-gray-100 font-semibold' : '' }}">💬 WA Templates</a></li>
      <li><a href="{{ route('admin.wa_logs.index') }}" class="flex items-center gap-3 p-2 rounded hover:bg-gray-100">📡 WA Logs</a></li>
      <li><a href="{{ route('admin.settings.edit') }}" class="flex items-center gap-3 p-2 rounded hover:bg-gray-100">⚙️ Settings</a></li>
      <li><a href="{{ route('admin.logout') }}" class="flex items-center gap-3 p-2 rounded hover:bg-gray-100">🚪 Logout</a></li>
    </ul>
  </nav>
</aside>
