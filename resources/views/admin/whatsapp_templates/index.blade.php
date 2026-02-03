@extends('admin.layout')

@section('page-title','WhatsApp Templates')

@section('content')
<x-admin.card title="WhatsApp Templates">
  @if(session('success'))<div class="text-green-600 mb-3">{{ session('success') }}</div>@endif

  <x-admin.table>
    <x-slot name="thead">
      <tr><th>Key</th><th>Locale</th><th>Preview</th><th>Action</th></tr>
    </x-slot>

    @foreach($templates as $t)
      <tr>
        <td class="py-2">{{ $t->key }}</td>
        <td class="py-2">{{ $t->locale }}</td>
        <td class="py-2"><pre style="white-space:pre-wrap">{{ $t->body }}</pre></td>
        <td class="py-2"><a href="{{ route('admin.whatsapp-templates.edit', $t->id) }}"><x-admin.button variant="muted">Edit</x-admin.button></a></td>
      </tr>
    @endforeach
    </x-admin.table>
</x-admin.card>
@endsection
