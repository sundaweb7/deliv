@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Create Slide</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('admin.slides.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control" accept="image/png,image/jpeg,image/jpg,image/svg+xml,image/gif,image/webp" id="imageInput">
            <small class="form-text text-muted">Supported formats: PNG, JPEG, SVG, GIF, WEBP. Max 2MB.</small>
            <div class="mt-2"><img id="imagePreview" src="#" style="max-height:120px; display:none"></div>
        </div>
        <div class="form-group">
            <label>Order</label>
            <input type="number" name="order" class="form-control">
        </div>
        <div class="form-group">
            <label>Active</label>
            <select name="is_active" class="form-control">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <button class="btn btn-primary">Create</button>
    </form>

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
</script>
@endsection
</div>
@endsection