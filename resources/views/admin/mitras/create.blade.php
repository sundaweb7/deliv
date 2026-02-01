@extends('admin.layout')

@section('content')
<h1>Create Mitra</h1>
@if($errors->any())<div style="color:red">{{ $errors->first() }}</div>@endif
<form method="POST" action="{{ route('admin.mitras.store') }}">
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
  <select name="delivery_type"><option value="app_driver">App Driver</option><option value="delivery_kurir">Delivery Kurir</option></select><br>
  <button type="submit">Create</button>
</form>
@endsection