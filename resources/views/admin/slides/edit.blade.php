@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Edit Slide</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('admin.slides.update', ['slide' => $slide['id']]) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label>Current Image</label>
            @if($slide['image_url'])<div><img src="{{ $slide['image_url'] }}" style="height:80px"></div>@endif
            <label>Replace Image</label>
            <input type="file" name="image" class="form-control" accept="image/png,image/jpeg,image/jpg,image/svg+xml,image/gif,image/webp" id="imageInput">
            <small class="form-text text-muted">Supported formats: PNG, JPEG, SVG, GIF, WEBP. Max 2MB.</small>
            <div class="mt-2"><img id="imagePreview" src="#" style="max-height:120px; display:none"></div>
        </div>

@section('scripts')
<script>
const imgInput = document.getElementById('imageInput');
if (imgInput){
    imgInput.addEventListener('change', function(e){
        const f = this.files[0];
        if (!f) return;
        const allowed = ['image/png','image/jpeg','image/jpg','image/svg+xml','image/gif','image/webp'];
        if (!allowed.includes(f.type)){
            alert('Unsupported file type');
            this.value = '';
            return;
        }
        if (f.size > 2 * 1024 * 1024){
            alert('File too large (max 2MB)');
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
}
</script>
@endsection
        <div class="form-group">
            <label>Order</label>
            <input type="number" name="order" class="form-control" value="{{ $slide['order'] ?? '' }}">
        </div>
        <div class="form-group">
            <label>Active</label>
            <select name="is_active" class="form-control">
                <option value="1" {{ $slide['is_active'] ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ !$slide['is_active'] ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection