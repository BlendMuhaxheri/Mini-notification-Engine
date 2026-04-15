@props(['title', 'value', 'icon' => ''])

<div class="bg-white rounded-lg shadow p-6 flex items-center space-x-4">
    <div class="text-blue-500 text-3xl">{!! $icon !!}</div>
    <div>
        <p class="text-gray-500">{{ $title }}</p>
        <p class="text-xl font-bold">{{ $value }}</p>
    </div>
</div>