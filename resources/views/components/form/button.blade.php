@props([
'variant' => 'primary',
'type' => 'button',
'href' => null
])

@php
$base = 'inline-flex items-center justify-center px-4 py-2 rounded-lg text-sm font-medium transition';

$variants = [
'primary' => 'bg-indigo-600 text-white hover:bg-indigo-700',
'secondary' => 'bg-gray-100 text-gray-700 hover:bg-gray-200',
'danger' => 'bg-red-500 text-white hover:bg-red-600',
'success' => 'bg-green-500 text-white hover:bg-green-600',
];

$classes = $base.' '.($variants[$variant] ?? $variants['primary']);
@endphp

@if($href)
<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
@else
<button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</button>
@endif