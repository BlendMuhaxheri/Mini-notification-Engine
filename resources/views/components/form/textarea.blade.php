@props(['label', 'name', 'value' => ''])

<div>
    <label class="block text-gray-700 font-medium mb-1">{{ $label }}</label>
    <textarea name="{{ $name }}" rows="4"
        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $value }}</textarea>
</div>