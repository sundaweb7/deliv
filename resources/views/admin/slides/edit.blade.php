@extends('admin.layout')

@section('page-title','Edit Slide')

@section('content')
<x-admin.card :title="'Edit Slide #' . ($slide['id'] ?? '')">
  @if ($errors->any())<div class="text-red-600 mb-3">@foreach($errors->all() as $err){{ $err }}<br>@endforeach</div>@endif

  <form method="post" action="{{ route('admin.slides.update', ['slide' => $slide['id']]) }}" enctype="multipart/form-data" class="space-y-3">
    @csrf
    @method('put')

    <div>
      <label class="text-sm text-gray-600">Current Image</label>
      @if($slide['image_url'])<div class="mb-2"><img src="{{ $slide['image_url'] }}" style="height:80px"></div>@endif
      <label class="text-sm text-gray-600">Replace Image</label>
      <input type="file" name="image" accept="image/png,image/jpeg,image/jpg,image/svg+xml,image/gif,image/webp" id="imageInput" class="mt-1 block w-full">
      <small class="text-sm text-gray-500">Supported formats: PNG, JPEG, SVG, GIF, WEBP. Max 2MB.</small>
      <div class="mt-2"><img id="imagePreview" src="#" style="max-height:120px; display:none"></div>
    </div>

    <div>
      <label class="text-sm text-gray-600">Order</label>
      <input type="number" name="order" class="mt-1 block w-full border rounded p-2" value="{{ $slide['order'] ?? '' }}">
    </div>

    <div>
      <label class="text-sm text-gray-600">Active</label>
      <select name="is_active" class="mt-1 block w-full border rounded p-2"><option value="1" {{ $slide['is_active'] ? 'selected' : '' }}>Yes</option><option value="0" {{ !$slide['is_active'] ? 'selected' : '' }}>No</option></select>
    </div>

    <div class="flex justify-end">
      <x-admin.button>Update</x-admin.button>
    </div>
  </form>

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
</x-admin.card>
@endsection