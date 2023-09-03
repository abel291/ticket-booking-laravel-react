@props(['disabled' => false, 'label' => '', 'optionDefault' => true])
@php
    $id = $attributes->whereStartsWith('wire:model')->first();
@endphp
<div>
    @if ($label)
        <x-form.input-label for="{{ $id }}">{{ $label }}</x-input-label>
    @endif

    <select id="{{ $id }}" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
        'class' => 'select-form mt-2',
    ]) !!}>
        @if ($optionDefault)
            <option value="">Seleccione una opcion</option>
        @endif

        {{ $slot }}
    </select>

    <x-form.input-error :for="$id" />
</div>
