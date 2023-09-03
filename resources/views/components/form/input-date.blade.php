@props(['label'])
@php
    $id = $attributes->whereStartsWith('wire:model')->first();
    $ref = 'd' . uniqid();
@endphp
<div>
    <x-form.input-label for="{{ $id }}">{{ $label ?? $slot }}</x-form.input-label>

    <div x-data="{ value: @entangle($attributes->wire('model')) }">
        <x-form.text-input id="{{ $id }}" {{ $attributes->whereDoesntStartWith('wire:model') }}
            x-ref="{{ $ref }}" x-init="$nextTick(() => {
                flatpickr($refs.{{ $ref }}, {
                    locale: 'es',
                    time_24hr: false,
                    dateFormat: 'Y-m-d H:i:s',
                    altFormat: 'F j, Y h:i K',
                    altInput: true,
                    defaultDate: value,
                    enableTime: true,
                    onChange: function(selectedDates, dateStr, instance) {
                        value = dateStr
                    },
                })
            })" />



    </div>

</div>
