<div {{ $attributes->merge(['class' => 'bg-white shadow rounded p-4']) }}>
    @if(isset($title))
        <div class="flex items-center justify-between mb-3">
            <h3 class="font-semibold text-lg">{{ $title }}</h3>
            {{ $header ?? '' }}
        </div>
    @endif
    {{ $slot }}
</div>
