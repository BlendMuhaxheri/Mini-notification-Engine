@props(['title'])

<div class="bg-white p-6 rounded-lg shadow-md w-full max-w-2xl">
    <h2 class="text-xl font-bold mb-4">{{ $title }}</h2>
    <form {{ $attributes->merge(['class' => 'space-y-4']) }}>
        {{ $slot }}
    </form>
</div>