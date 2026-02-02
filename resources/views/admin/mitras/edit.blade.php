@extends('admin.layout')

@section('content')
<h1>Edit Mitra</h1>
@if($errors->any())<div style="color:red">{{ $errors->first() }}</div>@endif
<form method="POST" action="{{ route('admin.mitras.update', $mitra->id) }}" enctype="multipart/form-data">
  @csrf @method('PUT')
  <label>Name</label><br>
  <input name="name" value="{{ old('name', $mitra->user->name ?? '') }}" required><br>
  <label>Email</label><br>
  <input name="email" type="email" value="{{ old('email', $mitra->user->email ?? '') }}" required><br>
  <label>Phone</label><br>
  <input name="phone" value="{{ old('phone', $mitra->user->phone ?? '') }}"><br>
  <label>Delivery Type</label><br>
  <input type="hidden" name="delivery_type" value="anyerdeliv">
  <span>AnyerDeliv (platform courier)</span><br>

  <label>Profile Photo</label><br>
  <input type="file" name="profile_photo" accept="image/*"><br>
  @if($mitra->profile_photo)
    <img src="{{ asset('storage/mitra-photos/' . $mitra->profile_photo) }}" style="height:80px;margin-top:6px;" />
  @endif

  <label>Store Photo</label><br>
  <input type="file" name="store_photo" accept="image/*"><br>
  @if($mitra->store_photo)
    <img src="{{ asset('storage/mitra-store-photos/' . $mitra->store_photo) }}" style="height:80px;margin-top:6px;" />
  @endif

  <label>Active</label><br>
  <select name="is_active"><option value="1" {{ $mitra->is_active ? 'selected' : '' }}>Yes</option><option value="0" {{ !$mitra->is_active ? 'selected' : '' }}>No</option></select><br>
  <button type="submit">Update</button>
</form>
@endsection