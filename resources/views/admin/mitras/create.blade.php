@extends('admin.layout')

@section('content')
<h1>Create Mitra</h1>
@if($errors->any())<div style="color:red">{{ $errors->first() }}</div>@endif
<form method="POST" action="{{ route('admin.mitras.store') }}" enctype="multipart/form-data">
  @csrf
  <label>Name</label><br>
  <input name="name" value="{{ old('name') }}" required><br>
  <label>Email</label><br>
  <input name="email" type="email" value="{{ old('email') }}" required><br>
  <label>Phone</label><br>
  <input name="phone" value="{{ old('phone') }}"><br>
  <label>Password (optional)</label><br>
  <input name="password" type="password"><br>
  <label>Delivery Type</label><br>
  <input type="hidden" name="delivery_type" value="anyerdeliv">
  <span>AnyerDeliv (platform courier)</span><br>

  <label>Profile Photo</label><br>
  <input type="file" name="profile_photo" accept="image/*"><br>

  <label>Store Photo</label><br>
  <input type="file" name="store_photo" accept="image/*"><br>

  <button type="submit">Create</button>
</form>
@endsection