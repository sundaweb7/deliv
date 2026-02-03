@extends('admin.layout')

@section('page-title','Create Product')

@section('content')
<x-admin.card title="Create Product">
  @if($errors->any())<div class="text-red-600 mb-3">{{ $errors->first() }}</div>@endif
  <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data" class="space-y-3">
    @csrf
    <div>
      <label class="text-sm text-gray-600">Mitra</label>
      <select name="mitra_id" class="mt-1 block w-full border rounded p-2">@foreach($mitras as $m)<option value="{{ $m->id }}">{{ $m->user->name ?? $m->id }}</option>@endforeach</select>
    </div>

    <div>
      <label class="text-sm text-gray-600">Name</label>
      <input name="name" required class="mt-1 block w-full border rounded p-2">
    </div>

    <div>
      <label class="text-sm text-gray-600">Description</label>
      <textarea name="description" class="mt-1 block w-full border rounded p-2"></textarea>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
      <div>
        <label class="text-sm text-gray-600">Price</label>
        <input name="price" required type="number" class="mt-1 block w-full border rounded p-2">
      </div>
      <div>
        <label class="text-sm text-gray-600">Stock</label>
        <input name="stock" required type="number" value="1" class="mt-1 block w-full border rounded p-2">
      </div>
    </div>

    <div>
      <label class="text-sm text-gray-600">Image</label>
      <input type="file" name="image" accept="image/png,image/jpeg,image/jpg,image/svg+xml,image/gif,image/webp" id="imageInput" class="mt-1 block w-full">
      <small class="text-sm text-gray-500">Supported: PNG, JPEG, SVG, GIF, WEBP. Max 5MB.</small>
      <div class="mt-2"><img id="imagePreview" src="#" style="max-height:120px; display:none"></div>
    </div>

    <div class="flex justify-end">
      <x-admin.button>Create</x-admin.button>
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