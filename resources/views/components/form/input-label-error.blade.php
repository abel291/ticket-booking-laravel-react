@props(['label' => ''])
<div>
    <x-form.input-label for="{{ $attributes->whereStartsWith('wire:model')->first() }}">
        {{ $slot }}</x-form.input-label>
    <x-form.text-input id="{{ $attributes->whereStartsWith('wire:model')->first() }}" {{ $attributes }} />
    <x-form.input-error :for="$attributes->whereStartsWith('wire:model')->first()" />
</div>
