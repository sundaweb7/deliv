@extends('admin.layout')

@section('page-title','Edit Product')

@section('content')
<x-admin.card :title="'Edit Product - ' . ($product->name ?? '')">
  @if ($errors->any())
    <div class="alert alert-danger mb-3">{{ implode(', ', $errors->all()) }}</div>
  @endif
  <form method="post" action="{{ route('admin.products.update', ['product' => $product->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('put')

    <div class="mb-3">
      <label class="form-label">Mitra</label>
      <select name="mitra_id" class="form-select form-select-sm">
        @foreach($mitras as $m)
          <option value="{{ $m->id }}" {{ $m->id == $product->mitra_id ? 'selected' : '' }}>{{ $m->user->name ?? 'Mitra ' . $m->id }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Name</label>
      <input type="text" name="name" value="{{ $product->name }}" class="form-control form-control-sm">
    </div>

    <div class="mb-3">
      <label class="form-label">Description</label>
      <textarea name="description" class="form-control form-control-sm">{{ $product->description }}</textarea>
    </div>

    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label">Price</label>
        <input type="number" name="price" value="{{ $product->price }}" class="form-control form-control-sm">
      </div>
      <div class="col-md-6">
        <label class="form-label">Stock</label>
        <input type="number" name="stock" value="{{ $product->stock }}" class="form-control form-control-sm">
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label">Image</label>
      @if($product->image) <div class="mb-2"><img id="currentImage" src="{{ $product->thumb_url }}" class="img-thumbnail" style="height:80px"></div> @endif
      <input type="file" name="image" id="imageInput" class="form-control form-control-sm">
      <small class="form-text text-muted">Supported: PNG, JPEG, SVG, GIF, WEBP. Max 5MB.</small>
      <div class="mt-2"><img id="imagePreview" src="#" class="img-fluid" style="display:none"></div>
    </div>

    <div class="d-flex justify-content-end">
      <x-admin.button class="btn-primary">Update</x-admin.button>
    </div>
  </form>
</x-admin.card>

@section('scripts')
<script>
const imageInput = document.getElementById('imageInput');
if (imageInput){
    imageInput.addEventListener('change', function(e){
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
            const curr = document.getElementById('currentImage'); if (curr) curr.style.display = 'none';
        };
        reader.readAsDataURL(f);
    });
}
</script>
@endsection
@endsection