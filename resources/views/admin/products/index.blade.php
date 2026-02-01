@extends('admin.layout')

@section('content')
<h1>Products</h1>
<p><a href="{{ route('admin.products.create') }}">Create product</a></p>
@if(session('success'))<div style="color:green">{{ session('success') }}</div>@endif
<table width="100%" border="0" cellpadding="8">
  <thead><tr><th>ID</th><th>Name</th><th>Mitra</th><th>Price</th><th>Stock</th><th>Actions</th></tr></thead>
  <tbody>
    @foreach($products as $p)
    <tr>
      <td>{{ $p->id }}</td>
      <td>
      @if($p->image)
        @if($p->thumb_url)
            <img src="{{ $p->thumb_url }}" style="max-width:80px;max-height:60px;display:block;margin-bottom:6px" onerror="this.onerror=null;this.src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAABH0lEQVR4nO3XsQ3AIAxEUfP+f7aG0m3BRY8ZQ6Zx3FQbwG7GxgYGBgYGBgYGBgYGBgYGBgYGBgYGBgYGBgYGDwQfF1k6F3X+v7q9ZyH0gC6oF2gWgOqgXaBaA6qBdoFoDqoF2gWgOqgXaBaA6qBdoFoDqoF2gWgOqgXaBaA6qBdoFoDqoF2gWgOqgXaBaA6qBdoFoDqoF2gWgOqgX6Bp8F+Q9M0wA2Fq9kQAAAABJRU5ErkJggg==';">
        @else
            <img src="{{ asset('storage/products/originals/' . $p->image) }}" style="max-width:80px;max-height:60px;display:block;margin-bottom:6px" onerror="this.onerror=null;this.src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAABH0lEQVR4nO3XsQ3AIAxEUfP+f7aG0m3BRY8ZQ6Zx3FQbwG7GxgYGBgYGBgYGBgYGBgYGBgYGBgYGBgYGBgYGDwQfF1k6F3X+v7q9ZyH0gC6oF2gWgOqgXaBaA6qBdoFoDqoF2gWgOqgXaBaA6qBdoFoDqoF2gWgOqgXaBaA6qBdoFoDqoF2gWgOqgXaBaA6qBdoFoDqoF2gWgOqgX6Bp8F+Q9M0wA2Fq9kQAAAABJRU5ErkJggg==';">
        @endif
      @endif
      {{ $p->name }}
    </td>
      <td>{{ $p->mitra->user->name ?? '-' }}</td>
      <td>{{ number_format($p->price,0,',','.') }}</td>
      <td>{{ $p->stock }}</td>
      <td>
        <a href="{{ route('admin.products.edit', ['product' => $p->id]) }}">Edit</a> |
        <form action="{{ route('admin.products.destroy', $p->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')<button type="submit">Delete</button></form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $products->links() }}
@endsection