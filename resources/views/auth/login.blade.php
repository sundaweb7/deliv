@extends('layout')

@section('content')
<div style="max-width:480px;margin:40px auto;padding:20px;border:1px solid #eee;border-radius:8px;background:#fff">
    <h2>Login</h2>
    @if($errors->any())
        <div style="color:#b00020;margin-bottom:10px">{{ $errors->first() }}</div>
    @endif
    <form method="post" action="{{ route('login.submit') }}">
        @csrf
        <div style="margin-bottom:10px">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" style="width:100%;padding:8px">
            <div style="text-align:center;margin:6px 0">or</div>
            <label>Phone</label>
            <input type="text" name="phone" value="{{ old('phone') }}" style="width:100%;padding:8px">
        </div>
        <div style="margin-bottom:10px">
            <label>Password</label>
            <input type="password" name="password" style="width:100%;padding:8px">
        </div>
        <div style="display:flex;gap:8px;align-items:center">
            <button class="btn btn-primary" style="padding:8px 12px">Login</button>
            <a href="/register">Register</a>
        </div>
    </form>
</div>
@endsection
