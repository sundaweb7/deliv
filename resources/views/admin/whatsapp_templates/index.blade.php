@extends('admin.layout')

@section('content')
<h1>WhatsApp Templates</h1>
@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
<table class="table">
    <thead><tr><th>Key</th><th>Locale</th><th>Preview</th><th>Action</th></tr></thead>
    <tbody>
    @foreach($templates as $t)
        <tr>
            <td>{{ $t->key }}</td>
            <td>{{ $t->locale }}</td>
            <td><pre style="white-space:pre-wrap">{{ $t->body }}</pre></td>
            <td><a class="btn btn-sm btn-primary" href="{{ route('admin.whatsapp-templates.edit', $t->id) }}">Edit</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
