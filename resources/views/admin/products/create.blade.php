@extends('admin.layout')

@section('page-title','Create Product')

@section('content')
<x-admin.card title="Create Product">
  @if($errors->any())
    <div class="alert alert-danger mb-3">{{ $errors->first() }}</div>
  @endif
  <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label class="form-label">Mitra</label>
      <select name="mitra_id" class="form-select form-select-sm">@foreach($mitras as $m)<option value="{{ $m->id }}">{{ $m->user->name ?? $m->id }}</option>@endforeach</select>
    </div>

    <div class="mb-3">
      <label class="form-label">Name</label>
      <input name="name" required class="form-control form-control-sm">
    </div>

    <div class="mb-3">
      <label class="form-label">Description</label>
      <textarea name="description" class="form-control form-control-sm"></textarea>
    </div>

    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label">Price</label>
        <input name="price" required type="number" class="form-control form-control-sm">
      </div>
      <div class="col-md-6">
        <label class="form-label">Stock</label>
        <input name="stock" required type="number" value="1" class="form-control form-control-sm">
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label">Image</label>
      <input type="file" name="image" accept="image/png,image/jpeg,image/jpg,image/svg+xml,image/gif,image/webp" id="imageInput" class="form-control form-control-sm">
      <small class="form-text text-muted">Supported: PNG, JPEG, SVG, GIF, WEBP. Max 5MB.</small>
      <div class="mt-2"><img id="imagePreview" src="#" class="img-fluid" style="display:none"></div>
    </div>

    <div class="d-flex justify-content-end">
      <x-admin.button class="btn-primary">Create</x-admin.button>
    </div>
  </form>
</x-admin.card>

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
@endsection