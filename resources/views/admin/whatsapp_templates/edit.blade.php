@extends('admin.layout')

@section('page-title','Edit WA Template')

@section('content')
<x-admin.card :title="'Template: ' . $tpl->key">
  <form method="POST" action="{{ route('admin.whatsapp-templates.update', $tpl->id) }}" class="space-y-3">
    @csrf
    <div>
      <label class="text-sm text-gray-600">Key</label>
      <input class="mt-1 block w-full border rounded p-2" readonly value="{{ $tpl->key }}">
    </div>
    <div>
      <label class="text-sm text-gray-600">Locale</label>
      <input class="mt-1 block w-full border rounded p-2" readonly value="{{ $tpl->locale }}">
    </div>
    <div>
      <label class="text-sm text-gray-600">Body (use placeholders :order_id :total :items :address :status :subtotal)</label>
      <textarea name="body" class="mt-1 block w-full border rounded p-2" rows="8">{{ old('body', $tpl->body) }}</textarea>
    </div>
    <div class="flex justify-end">
      <x-admin.button>Save</x-admin.button>
    </div>
  </form>
</x-admin.card>
@endsection
