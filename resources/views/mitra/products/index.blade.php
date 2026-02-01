@extends('layout')

@section('content')
<div style="max-width:900px;margin:20px auto">
    <h1>My Products</h1>
    @if(session('success'))<div style="color:green">{{ session('success') }}</div>@endif
    <table style="width:100%;border-collapse:collapse">
        <thead>
            <tr><th>ID</th><th>Name</th><th>Price</th><th>Stock</th><th>Actions</th></tr>
        </thead>
        <tbody>
            @foreach($products as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>
                    @if($p->thumb_url)
                        <img src="{{ $p->thumb_url }}" style="height:48px;display:block;margin-bottom:6px" onerror="this.onerror=null;this.src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAABH0lEQVR4nO3XsQ3AIAxEUfP+f7aG0m3BRY8ZQ6Zx3FQbwG7GxgYGBgYGBgYGBgYGBgYGBgYGBgYGBgYGBgYGDwQfF1k6F3X+v7q9ZyH0gC6oF2gWgOqgXaBaA6qBdoFoDqoF2gWgOqgXaBaA6qBdoFoDqoF2gWgOqgXaBaA6qBdoFoDqoF2gWgOqgXaBaA6qBdoFoDqoF2gWgOqgX6Bp8F+Q9M0wA2Fq9kQAAAABJRU5ErkJggg==';">
                    @endif
                    {{ $p->name }}
                </td>
                <td>{{ number_format($p->price) }}</td>
                <td>{{ $p->stock }}</td>
                <td><a href="{{ route('mitra.products.edit', ['product' => $p->id]) }}">Edit</a></td>
            </tr>
            @endforeach
            @if($products->isEmpty())<tr><td colspan="5">No products</td></tr>@endif
        </tbody>
    </table>
</div>
@endsection