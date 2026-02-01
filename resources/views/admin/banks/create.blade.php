@extends('admin.layout')

@section('content')
<h1>Create Bank</h1>
@if($errors->any())<div style="color:red">{{ $errors->first() }}</div>@endif
<form method="POST" action="{{ route('admin.banks.store') }}">
  @csrf
  <label>Name</label><br><input name="name" required><br>
  <label>Account name</label><br><input name="account_name"><br>
  <label>Account number</label><br><input name="account_number"><br>
  <label>Type</label><br><input name="type"><br>
  <label>Active</label><br><select name="is_active"><option value="1">Yes</option><option value="0">No</option></select><br>
  <button type="submit">Create</button>
</form>
@endsection