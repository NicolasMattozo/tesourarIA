@props([
    'type' => 'text',
    'name',
    'label' => null,
    'placeholder' => '',
    'required' => false,
    'value' => null,
])

<div class="w-full">
    @if ($label)
        <label for="{{ $name }}" class="block mb-1 text-sm font-semibold text-gray-700">
            {{ $label }}
            @if ($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" placeholder="{{ $placeholder }}" value="{{ old($name, $value) }}"
        {{ $required ? 'required' : '' }}
        class="
            block w-full rounded-lg border border-gray-300
            bg-white px-3 py-2 text-sm text-gray-900
            placeholder-gray-400
            shadow-sm
            transition
            focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20
            focus:outline-none
        " />
</div>
