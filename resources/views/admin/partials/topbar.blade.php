<header class="flex items-center justify-between bg-white shadow-sm p-4">
  <div class="flex items-center gap-3">
    <button class="md:hidden" @click="open = !open" x-data="{open:false}" @click="open = !open">☰</button>
    <h1 class="text-xl font-semibold">@yield('page-title', 'Dashboard')</h1>
  </div>
  <div class="flex items-center gap-4">
    <div class="text-sm text-gray-600">Admin</div>
    <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center">A</div>
  </div>
</header>
