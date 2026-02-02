@extends('admin.layout')

@section('content')
<h1>Edit User</h1>
@if($errors->any())<div style="color:red">{{ implode(', ', $errors->all()) }}</div>@endif
<form method="POST" action="{{ route('admin.users.update', $user->id) }}" enctype="multipart/form-data">
  @csrf @method('PUT')
  <label>Name</label><br>
  <input name="name" value="{{ old('name', $user->name) }}"><br>
  <label>Email</label><br>
  <input name="email" value="{{ old('email', $user->email) }}"><br>
  <label>Phone</label><br>
  <input name="phone" value="{{ old('phone', $user->phone) }}"><br>
  <label>WA Number</label><br>
  <input name="wa_number" value="{{ old('wa_number', $user->wa_number) }}"><br>
  <label>Address</label><br>
  <textarea name="address">{{ old('address', $user->address) }}</textarea><br>
  <label>Profile Photo</label><br>
  @if($user->profile_photo) <img src="{{ asset('storage/user-photos/'.$user->profile_photo) }}" style="height:80px"><br> @endif
  <input type="file" name="profile_photo"><br>
  <label>Role</label><br>
  <select name="role">
    <option value="admin" {{ $user->role=='admin' ? 'selected' : '' }}>Admin</option>
    <option value="mitra" {{ $user->role=='mitra' ? 'selected' : '' }}>Mitra</option>
    <option value="driver" {{ $user->role=='driver' ? 'selected' : '' }}>Driver</option>
    <option value="customer" {{ $user->role=='customer' ? 'selected' : '' }}>User</option>
  </select><br>
  <label>New password (leave blank to keep current)</label><br>
  <input type="password" name="password"><br>
  <button type="submit">Save</button>
</form>
@endsection