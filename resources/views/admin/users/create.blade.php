@extends('admin.layout')

@section('page-title','Create User')

@section('content')
<x-admin.card title="Create User">
  @if($errors->any())<div class="text-red-600 mb-3">{{ implode(', ', $errors->all()) }}</div>@endif
  <form method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data" class="space-y-3">
    @csrf
    <div>
      <label class="text-sm text-gray-600">Name</label>
      <input name="name" value="{{ old('name') }}" class="mt-1 block w-full border rounded p-2">
    </div>
    <div>
      <label class="text-sm text-gray-600">Email</label>
      <input name="email" value="{{ old('email') }}" class="mt-1 block w-full border rounded p-2">
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
      <div>
        <label class="text-sm text-gray-600">Phone</label>
        <input name="phone" value="{{ old('phone') }}" class="mt-1 block w-full border rounded p-2">
      </div>
      <div>
        <label class="text-sm text-gray-600">WA Number</label>
        <input name="wa_number" value="{{ old('wa_number') }}" class="mt-1 block w-full border rounded p-2">
      </div>
    </div>
    <div>
      <label class="text-sm text-gray-600">Address</label>
      <textarea name="address" class="mt-1 block w-full border rounded p-2">{{ old('address') }}</textarea>
    </div>

    <div>
      <label class="text-sm text-gray-600">Profile Photo</label>
      <input type="file" name="profile_photo" class="mt-1 block w-full">
    </div>

    <div>
      <label class="text-sm text-gray-600">Role</label>
      <select name="role" class="mt-1 block w-full border rounded p-2">
        <option value="admin">Admin</option>
        <option value="mitra">Mitra</option>
        <option value="driver">Driver</option>
        <option value="customer" selected>User</option>
      </select>
    </div>

    <div>
      <label class="text-sm text-gray-600">Password</label>
      <input type="password" name="password" class="mt-1 block w-full border rounded p-2">
    </div>

    <div class="flex justify-end">
      <x-admin.button>Create</x-admin.button>
    </div>
  </form>
</x-admin.card>
@endsection