@extends('admin.layout')

@section('content')
<div>
    <h1>Edit Product</h1>
    @if ($errors->any())
        <div style="color:#b00020">{{ implode(', ', $errors->all()) }}</div>
    @endif
    <form method="post" action="{{ route('admin.products.update', ['product' => $product->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div>
            <label>Mitra</label>
            <select name="mitra_id">
                @foreach($mitras as $m)
                <option value="{{ $m->id }}" {{ $m->id == $product->mitra_id ? 'selected' : '' }}>{{ $m->user->name ?? 'Mitra ' . $m->id }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{ $product->name }}">
        </div>
        <div>
            <label>Description</label>
            <textarea name="description">{{ $product->description }}</textarea>
        </div>
        <div>
            <label>Price</label>
            <input type="number" name="price" value="{{ $product->price }}">
        </div>
        <div>
            <label>Stock</label>
            <input type="number" name="stock" value="{{ $product->stock }}">
        </div>
        <div>
            <label>Image</label>
            @if($product->image) <div><img id="currentImage" src="{{ $product->thumb_url }}" style="height:80px"></div> @endif
            <input type="file" name="image" id="imageInput">
            <small>Supported: PNG, JPEG, SVG, GIF, WEBP. Max 5MB.</small>
            <div class="mt-2"><img id="imagePreview" src="#" style="max-height:120px; display:none"></div>
        </div>

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
        <div style="margin-top:8px">
            <button>Update</button>
        </div>
    </form>
</div>
@endsection