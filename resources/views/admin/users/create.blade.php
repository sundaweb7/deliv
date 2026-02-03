@extends('admin.layout')

@section('page-title','Create User')

@section('content')
<x-admin.card title="Create User">
  @if($errors->any())
    <div class="alert alert-danger mb-3">{{ implode(', ', $errors->all()) }}</div>
  @endif
  <form method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label class="form-label">Name</label>
      <input name="name" value="{{ old('name') }}" class="form-control form-control-sm">
    </div>
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input name="email" value="{{ old('email') }}" class="form-control form-control-sm">
    </div>
    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label">Phone</label>
        <input name="phone" value="{{ old('phone') }}" class="form-control form-control-sm">
      </div>
      <div class="col-md-6">
        <label class="form-label">WA Number</label>
        <input name="wa_number" value="{{ old('wa_number') }}" class="form-control form-control-sm">
      </div>
    </div>
    <div class="mb-3">
      <label class="form-label">Address</label>
      <textarea name="address" class="form-control form-control-sm">{{ old('address') }}</textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Profile Photo</label>
      <input type="file" name="profile_photo" class="form-control form-control-sm">
    </div>

    <div class="mb-3">
      <label class="form-label">Role</label>
      <select name="role" class="form-select form-select-sm">
        <option value="admin">Admin</option>
        <option value="mitra">Mitra</option>
        <option value="driver">Driver</option>
        <option value="customer" selected>User</option>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Password</label>
      <input type="password" name="password" class="form-control form-control-sm">
    </div>

    <div class="d-flex justify-content-end">
      <x-admin.button class="btn-primary">Create</x-admin.button>
    </div>
  </form>
</x-admin.card>
@endsection