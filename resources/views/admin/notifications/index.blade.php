@extends('admin.layout')

@section('content')
<h1>Send Notification</h1>
@if(session('success'))<div style="color:green">{{ session('success') }}</div>@endif
@if ($errors->any())<div style="color:#b00020">{{ implode(', ', $errors->all()) }}</div>@endif
<form method="post" action="{{ route('admin.notifications.send') }}">
    @csrf
    <div>
        <label>Title</label><br>
        <input type="text" name="title" style="width:400px" value="{{ old('title') }}">
    </div>
    <div>
        <label>Body</label><br>
        <textarea name="body" rows="4" style="width:400px">{{ old('body') }}</textarea>
    </div>
    <div>
        <label>Target</label><br>
        <select name="target">
            <option value="all">All devices</option>
            <option value="customers">Customers</option>
            <option value="mitras">Mitras</option>
            <option value="drivers">Drivers</option>
            <option value="manual">Manual tokens</option>
        </select>
    </div>
    <div>
        <label>Manual tokens (comma or newline separated)</label><br>
        <textarea name="manual_tokens" rows="4" style="width:400px">{{ old('manual_tokens') }}</textarea>
    </div>
    <div style="margin-top:8px">
        <button>Send</button>
    </div>
</form>
@endsection