<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Admin Login - Deliv</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center">
  <div class="w-full max-w-md bg-white shadow rounded p-6">
    <h2 class="text-2xl font-semibold mb-4">Admin Login</h2>
    @if(session('error')) <div class="text-red-600 mb-2">{{ session('error') }}</div> @endif
    <form method="post" action="{{ route('admin.login.post') }}">
      @csrf
      <div class="mb-3">
        <label class="block text-sm text-gray-600">Email</label>
        <input type="email" name="email" class="mt-1 w-full border rounded p-2" required>
      </div>
      <div class="mb-3">
        <label class="block text-sm text-gray-600">Password</label>
        <input type="password" name="password" class="mt-1 w-full border rounded p-2" required>
      </div>
      <div class="flex justify-end">
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Login</button>
      </div>
    </form>
  </div>
</body>
</html>