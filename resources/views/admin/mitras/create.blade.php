@extends('admin.layout')

@section('content')
<x-admin.card title="Create Mitra">
  @if($errors->any())<div class="alert alert-danger mb-3">{{ $errors->first() }}</div>@endif
  <form method="POST" action="{{ route('admin.mitras.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label class="form-label">Name</label>
      <input name="name" value="{{ old('name') }}" required class="form-control form-control-sm">
    </div>
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input name="email" type="email" value="{{ old('email') }}" required class="form-control form-control-sm">
    </div>
    <div class="mb-3">
      <label class="form-label">Phone</label>
      <input name="phone" value="{{ old('phone') }}" class="form-control form-control-sm">
    </div>
    <div class="mb-3">
      <label class="form-label">Password (optional)</label>
      <input name="password" type="password" class="form-control form-control-sm">
    </div>
    <input type="hidden" name="delivery_type" value="anyerdeliv">
    <div class="mb-3">
      <label class="form-label">Profile Photo</label>
      <input type="file" name="profile_photo" accept="image/*" class="form-control form-control-sm">
    </div>
    <div class="mb-3">
      <label class="form-label">Store Photo</label>
      <input type="file" name="store_photo" accept="image/*" class="form-control form-control-sm">
    </div>
    <div class="d-flex justify-content-end">
      <x-admin.button class="btn-primary">Create</x-admin.button>
    </div>
  </form>
</x-admin.card>
@endsection