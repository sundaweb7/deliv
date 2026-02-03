<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Admin - Deliv</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
  <!-- Fallback: load compiled CSS directly if Vite/manifest isn't available or not serving -->
  <link rel="stylesheet" href="{{ asset('build/app.css') }}">
  <!-- Inter font for better typography (loaded after CSS) -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap">
  <style>body{font-family:Inter,ui-sans-serif,system-ui,-apple-system,'Segoe UI',Roboto,'Helvetica Neue',Arial}</style>
</head>
<body class="bg-gray-50 min-h-screen text-gray-800">
  <div class="min-h-screen flex">
    @include('admin.partials.sidebar')

    <div class="flex-1 flex flex-col">
      @include('admin.partials.topbar')

      <main class="p-6">
        <div class="max-w-screen-lg mx-auto">
          @yield('content')
        </div>
      </main>
    </div>
  </div>
</body>
</html>