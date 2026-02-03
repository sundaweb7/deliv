@extends('admin.layout')

@section('page-title','Slides')

@section('content')
<x-admin.card title="Slides">
  @if(session('success'))<div class="text-green-600 mb-3">{{ session('success') }}</div>@endif
  <div class="flex justify-end mb-4"><a href="{{ route('admin.slides.create') }}"><x-admin.button>Create Slide</x-admin.button></a></div>

  <x-admin.table>
    <x-slot name="thead">
      <tr><th>ID</th><th>Image</th><th>Order</th><th>Active</th><th>Actions</th></tr>
    </x-slot>

    @foreach($slides as $s)
      <tr>
        <td class="py-2">{{ $s['id'] }}</td>
        <td class="py-2">@if($s['image_url'])<img src="{{ $s['image_url'] }}" style="height:60px">@endif</td>
        <td class="py-2">{{ $s['order'] }}</td>
        <td class="py-2">{{ $s['is_active'] ? 'Yes' : 'No' }}</td>
        <td class="py-2">
          <a href="{{ route('admin.slides.edit', ['slide' => $s['id']]) }}"><x-admin.button variant="muted">Edit</x-admin.button></a>
          <form action="{{ route('admin.slides.toggle', ['slide' => $s['id']]) }}" method="post" style="display:inline">@csrf<button class="ml-2"><x-admin.button variant="muted">Toggle</x-admin.button></button></form>
          <form action="{{ route('admin.slides.destroy', ['slide' => $s['id']]) }}" method="post" style="display:inline">@csrf @method('delete')<button class="ml-2"><x-admin.button variant="danger">Delete</x-admin.button></button></form>
        </td>
      </tr>
    @endforeach
  </x-admin.table>
</x-admin.card>
@endsection