@extends('admin.layout')

@section('page-title','Products')

@section('content')
<x-admin.card title="Products">
  @if(session('success'))<div class="text-green-600 mb-3">{{ session('success') }}</div>@endif
  <div class="flex justify-end mb-4"><a href="{{ route('admin.products.create') }}"><x-admin.button>Create product</x-admin.button></a></div>

  <x-admin.table>
    <x-slot name="thead">
      <tr><th>ID</th><th>Name</th><th>Mitra</th><th>Price</th><th>Stock</th><th>Actions</th></tr>
    </x-slot>

    @foreach($products as $p)
      <tr>
        <td class="py-2">{{ $p->id }}</td>
        <td class="py-2">
          @if($p->image)
            <img src="{{ $p->thumb_url ?? asset('storage/products/originals/' . $p->image) }}" class="inline-block mr-3" style="max-width:80px;max-height:60px" onerror="this.onerror=null;this.src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAABH0lEQVR4nO3XsQ3AIAxEUfP+f7aG0m3BRY8ZQ6Zx3FQbwG7GxgYGBgYGBgYGBgYGBgYGBgYGBgYGBgYGBgYGDwQfF1k6F3X+v7q9ZyH0gC6oF2gWgOqgXaBaA6qBdoFoDqoF2gWgOqgXaBaA6qBdoFoDqoF2gWgOqgXaBaA6qBdoFoDqoF2gWgOqgXaBaA6qBdoFoDqoF2gWgOqgX6Bp8F+Q9M0wA2Fq9kQAAAABJRU5ErkJggg==';">
          @endif
          {{ $p->name }}
        </td>
        <td class="py-2">{{ $p->mitra->user->name ?? '-' }}</td>
        <td class="py-2">{{ number_format($p->price,0,',','.') }}</td>
        <td class="py-2">{{ $p->stock }}</td>
        <td class="py-2">
          <a href="{{ route('admin.products.edit', ['product' => $p->id]) }}"><x-admin.button variant="muted">Edit</x-admin.button></a>
          <form action="{{ route('admin.products.destroy', $p->id) }}" method="POST" style="display:inline">@csrf @method('DELETE')<button type="submit" class="ml-2"><x-admin.button variant="danger">Delete</x-admin.button></button></form>
        </td>
      </tr>
    @endforeach
  </x-admin.table>

  <x-admin.pagination :paginator="$products" />
</x-admin.card>
@endsection