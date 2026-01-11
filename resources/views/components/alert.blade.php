@props([
    'type' => 'success' // success | error
])

@php
    $styles = [
        'success' => 'bg-green-100 text-green-800',
        'error' => 'bg-red-100 text-red-800',
    ];
@endphp

<div class="mb-4 rounded-lg px-4 py-3 {{ $styles[$type] }}">
    {{ $slot }}
</div>
