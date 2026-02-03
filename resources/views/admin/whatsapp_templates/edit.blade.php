@extends('admin.layout')

@section('content')
<h1>Edit Template</h1>
<form method="POST" action="{{ route('admin.whatsapp-templates.update', $tpl->id) }}">
    @csrf
    <div class="form-group">
        <label>Key</label>
        <input class="form-control" readonly value="{{ $tpl->key }}">
    </div>
    <div class="form-group">
        <label>Locale</label>
        <input class="form-control" readonly value="{{ $tpl->locale }}">
    </div>
    <div class="form-group">
        <label>Body (use placeholders :order_id :total :items :address :status :subtotal)</label>
        <textarea name="body" class="form-control" rows="8">{{ old('body', $tpl->body) }}</textarea>
    </div>
    <button class="btn btn-primary">Save</button>
</form>
@endsection
