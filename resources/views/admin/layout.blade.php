<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Admin - Deliv</title>

  @vite(['resources/css/app.css','resources/js/app.js'])

  <!-- Google fonts used by the theme -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">

  <!-- Theme icon font (local) -->
  <link rel="stylesheet" href="{{ asset('theme/gxon-assets/libs/flaticon/css/all/all.css') }}">
  <!-- Font Awesome fallback CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-p2c9q+Q5Q0n3+eS0zXv1c8a+0GQK2GZQqg3XQk6c1P4sQ0mFqv0g0J3XQ0g+Zx4Q0hA6mQ0bQ0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- GXON theme CSS (static fallback) -->
  <link rel="stylesheet" href="{{ asset('theme/gxon-assets/css/styles.css') }}">
  <!-- SimpleBar CSS (CDN) for custom scrollbars -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simplebar/6.2.4/simplebar.min.css" integrity="sha512-kx5Oq6b2mQKx7Z2Y7r1s6qW9xX9k3qJb1Z4r7p2a5s8nL0h1g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  @stack('styles')
</head>
<body>
  <div class="page-layout">
    @include('vendor.gxon.includes.header')
    @include('vendor.gxon.includes.sidebar-pruned')

    <main class="app-wrapper">
      <div class="container">
        @yield('content')
      </div>
    </main>

    @include('vendor.gxon.includes.footer')
  </div>

  <!-- SimpleBar (scrollbar) CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/simplebar/6.2.4/simplebar.min.js" integrity="sha512-6q8bK4s2SZfv5h6tX0a6qJ9p3V9a1r2K9k3b0wK2mN3O1sH8r7Q9p==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  @stack('scripts')
</body>
</html>