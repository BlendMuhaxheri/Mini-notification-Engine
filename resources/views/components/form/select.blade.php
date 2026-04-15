@props([
'label' => '',
'name',
'options' => [],
'value' => null
])

<div>
    @if($label)
    <label class="block text-sm font-medium text-slate-700 mb-1">
        {{ $label }}
    </label>
    @endif

    <select
        name="{{ $name }}"
        id="{{ $name }}"
        {{ $attributes->merge([
            'class' => 'w-full rounded-lg border border-slate-300 px-4 py-2.5 bg-white focus:ring-2 focus:ring-indigo-500'
        ]) }}>
        @foreach($options as $key => $option)
        <option value="{{ $key }}" {{ old($name,$value)==$key ? 'selected' : '' }}>
            {{ $option }}
        </option>
        @endforeach
    </select>
</div>