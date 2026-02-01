@extends('layout')

@section('content')
<div style="max-width:480px;margin:40px auto;padding:20px;border:1px solid #eee;border-radius:8px;background:#fff">
    <h2>Register</h2>
    @if($errors->any())
        <div style="color:#b00020;margin-bottom:10px">{{ implode(', ', $errors->all()) }}</div>
    @endif
    <form method="post" action="{{ route('register.submit') }}">
        @csrf
        <div style="margin-bottom:10px">
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name') }}" style="width:100%;padding:8px">
        </div>
        <div style="margin-bottom:10px">
            <label>Email (optional)</label>
            <input type="email" name="email" value="{{ old('email') }}" style="width:100%;padding:8px">
        </div>
        <div style="margin-bottom:10px">
            <label>Phone (required if no email)</label>
            <input type="text" name="phone" value="{{ old('phone') }}" style="width:100%;padding:8px">
        </div>
        <div style="margin-bottom:10px">
            <label>Password</label>
            <input type="password" name="password" style="width:100%;padding:8px">
        </div>
        <div style="margin-bottom:10px">
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" style="width:100%;padding:8px">
        </div>
        <div style="margin-bottom:10px">
            <label>Role</label>
            <select name="role" style="width:100%;padding:8px">
                <option value="customer" {{ old('role') === 'customer' ? 'selected' : '' }}>Customer</option>
                <option value="mitra" {{ old('role') === 'mitra' ? 'selected' : '' }}>Mitra</option>
                <option value="driver" {{ old('role') === 'driver' ? 'selected' : '' }}>Driver</option>
            </select>
        </div>
        <div style="display:flex;gap:8px;align-items:center">
            <button class="btn" style="padding:8px 12px">Register</button>
            <a href="/login">Login</a>
        </div>
    </form>
</div>
@endsection