@extends('admin.layout')

@section('content')
<h1>Create Product</h1>
@if($errors->any())<div style="color:red">{{ $errors->first() }}</div>@endif
<form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
  @csrf
  <label>Mitra</label><br>
  <select name="mitra_id">@foreach($mitras as $m)<option value="{{ $m->id }}">{{ $m->user->name ?? $m->id }}</option>@endforeach</select><br>
  <label>Name</label><br><input name="name" required><br>
  <label>Description</label><br><textarea name="description"></textarea><br>
  <label>Price</label><br><input name="price" required type="number"><br>
  <label>Stock</label><br><input name="stock" required type="number" value="1"><br>
  <label>Image</label><br>
  <input type="file" name="image" accept="image/png,image/jpeg,image/jpg,image/svg+xml,image/gif,image/webp" id="imageInput"><br>
  <small>Supported: PNG, JPEG, SVG, GIF, WEBP. Max 5MB.</small>
  <div class="mt-2"><img id="imagePreview" src="#" style="max-height:120px; display:none"></div>

@section('scripts')
<script>
document.getElementById('imageInput').addEventListener('change', function(e){
    const f = this.files[0];
    if (!f) return;
    const allowed = ['image/png','image/jpeg','image/jpg','image/svg+xml','image/gif','image/webp'];
    if (!allowed.includes(f.type)){
        alert('Unsupported file type');
        this.value = '';
        return;
    }
    if (f.size > 5 * 1024 * 1024){
        alert('File too large (max 5MB)');
        this.value = '';
        return;
    }
    const reader = new FileReader();
    reader.onload = function(ev){
        const img = document.getElementById('imagePreview');
        img.src = ev.target.result;
        img.style.display = 'block';
    };
    reader.readAsDataURL(f);
});
</script>
@endsection
  <button type="submit">Create</button>
</form>
@endsection