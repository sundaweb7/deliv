@extends('admin.layout')

@section('content')
<h1>Edit Bank</h1>
@if($errors->any())<div style="color:red">{{ $errors->first() }}</div>@endif
<form method="POST" action="{{ route('admin.banks.update', $b->id) }}">
  @csrf @method('PUT')
  <label>Name</label><br><input name="name" value="{{ $b->name }}" required><br>
  <label>Account name</label><br><input name="account_name" value="{{ $b->account_name }}"><br>
  <label>Account number</label><br><input name="account_number" value="{{ $b->account_number }}"><br>
  <label>Type</label><br><input name="type" value="{{ $b->type }}"><br>
  <label>Active</label><br><select name="is_active"><option value="1" {{ $b->is_active ? 'selected':'' }}>Yes</option><option value="0" {{ !$b->is_active ? 'selected':'' }}>No</option></select><br>
  <button type="submit">Update</button>
</form>
@endsection