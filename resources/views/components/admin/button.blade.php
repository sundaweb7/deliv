@props(['variant' => 'primary'])
@php
$classes = 'btn';
if ($variant === 'primary') $classes .= ' btn-primary';
elseif ($variant === 'danger') $classes .= ' btn-danger';
elseif ($variant === 'muted') $classes .= ' btn-outline-secondary';
@endphp
<button {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</button>