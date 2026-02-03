<div {{ $attributes->merge(['class' => 'card']) }}>
    @if(isset($title))
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">{{ $title }}</h5>
            {{ $header ?? '' }}
        </div>
    @endif
    <div class="card-body">
        {{ $slot }}
    </div>
</div>
