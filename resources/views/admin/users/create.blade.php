@extends('admin.layout')

@section('content')
<h1>Create User</h1>
@if($errors->any())<div style="color:red">{{ implode(', ', $errors->all()) }}</div>@endif
<form method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
  @csrf
  <label>Name</label><br>
  <input name="name" value="{{ old('name') }}"><br>
  <label>Email</label><br>
  <input name="email" value="{{ old('email') }}"><br>
  <label>Phone</label><br>
  <input name="phone" value="{{ old('phone') }}"><br>
  <label>WA Number</label><br>
  <input name="wa_number" value="{{ old('wa_number') }}"><br>
  <label>Address</label><br>
  <textarea name="address">{{ old('address') }}</textarea><br>
  <label>Profile Photo</label><br>
  <input type="file" name="profile_photo"><br>
  <label>Role</label><br>
  <select name="role">
    <option value="admin">Admin</option>
    <option value="mitra">Mitra</option>
    <option value="driver">Driver</option>
    <option value="customer" selected>User</option>
  </select><br>
  <label>Password</label><br>
  <input type="password" name="password"><br>
  <button type="submit">Create</button>
</form>
@endsection