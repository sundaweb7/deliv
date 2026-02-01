@extends('admin.layout')

@section('content')
<h1>Edit Mitra</h1>
@if($errors->any())<div style="color:red">{{ $errors->first() }}</div>@endif
<form method="POST" action="{{ route('admin.mitras.update', $mitra->id) }}">
  @csrf @method('PUT')
  <label>Name</label><br>
  <input name="name" value="{{ old('name', $mitra->user->name ?? '') }}" required><br>
  <label>Email</label><br>
  <input name="email" type="email" value="{{ old('email', $mitra->user->email ?? '') }}" required><br>
  <label>Phone</label><br>
  <input name="phone" value="{{ old('phone', $mitra->user->phone ?? '') }}"><br>
  <label>Delivery Type</label><br>
  <select name="delivery_type"><option value="app_driver" {{ $mitra->delivery_type=='app_driver'?'selected':'' }}>App Driver</option><option value="delivery_kurir" {{ $mitra->delivery_type=='delivery_kurir'?'selected':'' }}>Delivery Kurir</option></select><br>
  <label>Active</label><br>
  <select name="is_active"><option value="1" {{ $mitra->is_active ? 'selected' : '' }}>Yes</option><option value="0" {{ !$mitra->is_active ? 'selected' : '' }}>No</option></select><br>
  <button type="submit">Update</button>
</form>
@endsection