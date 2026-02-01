@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Create Shipping Model</h1>
    <form method="post" action="{{ route('mitra.shippings.store') }}">
        @csrf
        <div class="form-group"><label>Name</label><input name="name" class="form-control"></div>
        <div class="form-group"><label>Description</label><textarea name="description" class="form-control"></textarea></div>
        <h4>Rates</h4>
        <div id="rates">
            <div class="rate-row">
                <input name="rates[0][destination]" placeholder="Destination" class="form-control mb-1">
                <input name="rates[0][cost]" placeholder="Cost" class="form-control mb-1">
            </div>
        </div>
        <button type="button" id="add-rate" class="btn btn-sm btn-secondary">Add Rate</button>
        <div class="form-group mt-3"><button class="btn btn-primary">Create</button></div>
    </form>
</div>
<script>
    let idx = 1;
    document.getElementById('add-rate').addEventListener('click', function(){
        const div = document.createElement('div');
        div.className = 'rate-row';
        div.innerHTML = `<input name="rates[${idx}][destination]" placeholder="Destination" class="form-control mb-1"><input name="rates[${idx}][cost]" placeholder="Cost" class="form-control mb-1">`;
        document.getElementById('rates').appendChild(div);
        idx++;
    });
</script>
@endsection