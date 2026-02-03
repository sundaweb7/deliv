<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Admin - Deliv</title>

  <!-- GXON theme CSS -->
  <link rel="stylesheet" href="{{ asset('theme/gxon-assets/css/styles.css') }}">

  <!-- Google fonts used by the theme -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">

  @stack('styles')
</head>
<body>
  <div class="page-layout">
    @include('vendor.gxon.includes.header')
    @include('vendor.gxon.includes.sidebar')

    <main class="app-wrapper">
      <div class="container">
        @yield('content')
      </div>
    </main>

    @include('vendor.gxon.includes.footer')
  </div>

  <!-- GXON theme scripts -->
  <script src="{{ asset('theme/gxon-assets/js/appSettings.js') }}"></script>
  <script src="{{ asset('theme/gxon-assets/js/main.js') }}"></script>

  @stack('scripts')
</body>
</html>