@extends('layout')

@section('content')
<div style="max-width:1000px;margin:24px auto;padding:12px">
    <div style="display:flex;justify-content:space-between;align-items:center">
        <h2>App Preview</h2>
        <div>
            @auth
                <form method="post" action="{{ route('logout') }}" style="display:inline">
                    @csrf
                    <button style="padding:6px 10px">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>
            @endauth
        </div>
    </div>

    <section style="margin-top:16px">
        <h3>Slides</h3>
        <div style="display:flex;gap:8px;overflow:auto">
            @foreach($slides as $s)
                <div style="min-width:220px;border:1px solid #eee;padding:8px;border-radius:6px;text-align:center">
                    @if($s->thumb_url)
                        <img src="{{ $s->thumb_url }}" style="width:100%;height:120px;object-fit:cover;display:block;margin-bottom:6px">
                    @endif
                    <div>Order: {{ $s->order }}</div>
                </div>
            @endforeach
            @if($slides->isEmpty())<div>No slides</div>@endif
        </div>
    </section>

    <section style="margin-top:24px">
        <h3>Products</h3>
        <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:12px;margin-top:8px">
            @foreach($products as $p)
            <div style="border:1px solid #eee;padding:8px;border-radius:6px">
                @if($p->thumb_url)
                    <img src="{{ $p->thumb_url }}" style="width:100%;height:140px;object-fit:cover;margin-bottom:8px">
                @endif
                <div><strong>{{ $p->name }}</strong></div>
                <div>{{ number_format($p->price) }}</div>
            </div>
            @endforeach
            @if($products->isEmpty())<div>No products found</div>@endif
        </div>
    </section>

</div>
@endsection
