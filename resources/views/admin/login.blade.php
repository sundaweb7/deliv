<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Admin Login - Deliv</title>
  <style>body{font-family:Arial,Helvetica,sans-serif;max-width:600px;margin:40px auto}form{display:flex;flex-direction:column}label{margin-top:8px}input{padding:8px;margin-top:4px}button{margin-top:16px;padding:10px}</style>
</head>
<body>
  <h1>Admin Login</h1>
  @if ($errors->any())
    <div style="color:#c00">{{ $errors->first() }}</div>
  @endif
  <form method="POST" action="{{ route('admin.login.submit') }}">
    @csrf
    <label for="email">Email</label>
    <input id="email" name="email" type="email" value="{{ old('email', 'admin@deliv.test') }}" required />

    <label for="password">Password</label>
    <input id="password" name="password" type="password" value="password" required />

    <button type="submit">Sign in</button>
  </form>
</body>
</html>