@props([
'label',
'name',
'type' => 'text',
'value' => ''
])

<div class="space-y-1">
    <label class="block text-sm font-semibold text-gray-700">
        {{ $label }}
    </label>

    <input
        type="{{ $type }}"
        name="{{ $name }}"
        value="{{ $value }}"
        class="w-full rounded-xl border border-gray-300 bg-white px-4 py-2.5 text-sm shadow-sm
               transition duration-200
               placeholder:text-gray-400
               hover:border-gray-400
               focus:border-blue-500
               focus:ring-2 focus:ring-blue-200
               focus:outline-none" />
</div>