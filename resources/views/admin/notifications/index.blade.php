@extends('admin.layout')

@section('page-title','Send Notification')

@section('content')
<x-admin.card title="Send Notification">
  @if(session('success'))<div class="text-green-600 mb-3">{{ session('success') }}</div>@endif
  @if ($errors->any())<div class="text-red-600 mb-3">{{ implode(', ', $errors->all()) }}</div>@endif

  <form method="post" action="{{ route('admin.notifications.send') }}" class="space-y-3">
    @csrf
    <div>
      <label class="text-sm text-gray-600">Title</label>
      <input type="text" name="title" class="mt-1 block w-full border rounded p-2" value="{{ old('title') }}">
    </div>

    <div>
      <label class="text-sm text-gray-600">Body</label>
      <textarea name="body" rows="4" class="mt-1 block w-full border rounded p-2">{{ old('body') }}</textarea>
    </div>

    <div>
      <label class="text-sm text-gray-600">Target</label>
      <select name="target" class="mt-1 block w-full border rounded p-2">
        <option value="all">All devices</option>
        <option value="customers">Customers</option>
        <option value="mitras">Mitras</option>
        <option value="drivers">Drivers</option>
        <option value="manual">Manual tokens</option>
      </select>
    </div>

    <div>
      <label class="text-sm text-gray-600">Manual tokens (comma or newline separated)</label>
      <textarea name="manual_tokens" rows="4" class="mt-1 block w-full border rounded p-2">{{ old('manual_tokens') }}</textarea>
    </div>

    <div class="flex justify-end">
      <x-admin.button>Send</x-admin.button>
    </div>
  </form>
</x-admin.card>
@endsection