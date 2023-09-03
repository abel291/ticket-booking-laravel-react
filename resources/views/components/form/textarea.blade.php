@props(['disabled' => false, 'label'])
@php
    $id = $attributes->whereStartsWith('wire:model')->first();
@endphp
<div>
    <x-form.input-label for="{{ $id }}">{{ $label ?? $slot }}</x-form.input-label>

    <textarea id="{{ $id }}" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
        'class' => 'input-textarea',
    ]) !!}></textarea>

    <x-form.input-error :for="$id" />
</div>
