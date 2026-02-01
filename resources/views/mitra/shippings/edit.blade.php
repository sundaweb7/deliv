@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Edit Shipping Model</h1>
    <form method="post" action="{{ route('mitra.shippings.update', ['id'=>$model['id']]) }}">
        @csrf
        @method('put')
        <div class="form-group"><label>Name</label><input name="name" class="form-control" value="{{ $model['name'] }}"></div>
        <div class="form-group"><label>Description</label><textarea name="description" class="form-control">{{ $model['description'] }}</textarea></div>
        <h4>Rates</h4>
        <div id="rates">
            @foreach($model['rates'] as $i => $r)
                <div class="rate-row">
                    <input name="rates[{{$i}}][destination]" placeholder="Destination" class="form-control mb-1" value="{{ $r['destination'] }}">
                    <input name="rates[{{$i}}][cost]" placeholder="Cost" class="form-control mb-1" value="{{ $r['cost'] }}">
                </div>
            @endforeach
        </div>
        <button type="button" id="add-rate" class="btn btn-sm btn-secondary">Add Rate</button>
        <div class="form-group mt-3"><button class="btn btn-primary">Update</button></div>
    </form>
</div>
<script>
    let idx = {{ count($model['rates']) }};
    document.getElementById('add-rate').addEventListener('click', function(){
        const div = document.createElement('div');
        div.className = 'rate-row';
        div.innerHTML = `<input name="rates[${idx}][destination]" placeholder="Destination" class="form-control mb-1"><input name="rates[${idx}][cost]" placeholder="Cost" class="form-control mb-1">`;
        document.getElementById('rates').appendChild(div);
        idx++;
    });
</script>
@endsection