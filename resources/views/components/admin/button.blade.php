@props(['variant' => 'primary'])
@php
$classes = 'px-3 py-1 rounded inline-flex items-center justify-center text-sm';
if ($variant === 'primary') $classes .= ' bg-emerald-500 text-white hover:bg-emerald-600';
elseif ($variant === 'danger') $classes .= ' bg-red-500 text-white hover:bg-red-600';
elseif ($variant === 'muted') $classes .= ' bg-gray-100 text-gray-700 hover:bg-gray-200';
@endphp
<button {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</button>