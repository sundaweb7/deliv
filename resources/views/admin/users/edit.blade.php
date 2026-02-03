@extends('admin.layout')

@section('page-title','Edit User')

@section('content')
<x-admin.card :title="'Edit User - ' . ($user->name ?? '')">
  @if($errors->any())<div class="text-red-600 mb-3">{{ implode(', ', $errors->all()) }}</div>@endif
  <form method="POST" action="{{ route('admin.users.update', $user->id) }}" enctype="multipart/form-data" class="space-y-3">
    @csrf @method('PUT')
    <div>
      <label class="text-sm text-gray-600">Name</label>
      <input name="name" value="{{ old('name', $user->name) }}" class="mt-1 block w-full border rounded p-2">
    </div>
    <div>
      <label class="text-sm text-gray-600">Email</label>
      <input name="email" value="{{ old('email', $user->email) }}" class="mt-1 block w-full border rounded p-2">
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
      <div>
        <label class="text-sm text-gray-600">Phone</label>
        <input name="phone" value="{{ old('phone', $user->phone) }}" class="mt-1 block w-full border rounded p-2">
      </div>
      <div>
        <label class="text-sm text-gray-600">WA Number</label>
        <input name="wa_number" value="{{ old('wa_number', $user->wa_number) }}" class="mt-1 block w-full border rounded p-2">
      </div>
    </div>
    <div>
      <label class="text-sm text-gray-600">Address</label>
      <textarea name="address" class="mt-1 block w-full border rounded p-2">{{ old('address', $user->address) }}</textarea>
    </div>

    <div>
      <label class="text-sm text-gray-600">Profile Photo</label>
      @if($user->profile_photo) <div class="mb-2"><img src="{{ asset('storage/user-photos/'.$user->profile_photo) }}" style="height:80px"></div> @endif
      <input type="file" name="profile_photo" class="mt-1 block w-full">
    </div>

    <div>
      <label class="text-sm text-gray-600">Role</label>
      <select name="role" class="mt-1 block w-full border rounded p-2">
        <option value="admin" {{ $user->role=='admin' ? 'selected' : '' }}>Admin</option>
        <option value="mitra" {{ $user->role=='mitra' ? 'selected' : '' }}>Mitra</option>
        <option value="driver" {{ $user->role=='driver' ? 'selected' : '' }}>Driver</option>
        <option value="customer" {{ $user->role=='customer' ? 'selected' : '' }}>User</option>
      </select>
    </div>

    <div>
      <label class="text-sm text-gray-600">New password (leave blank to keep current)</label>
      <input type="password" name="password" class="mt-1 block w-full border rounded p-2">
    </div>

    <div class="flex justify-end">
      <x-admin.button>Save</x-admin.button>
    </div>
  </form>
</x-admin.card>
@endsection