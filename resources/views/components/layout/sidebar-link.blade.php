@props(['href', 'label', 'active' => false])

<a href="{{ $href }}" class="block px-4 py-2 rounded hover:bg-gray-700 {{ $active ? 'bg-gray-700 font-semibold' : '' }}">
    {{ $label }}
</a>