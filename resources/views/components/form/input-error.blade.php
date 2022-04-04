@props(['for'])

@error($for)
    <p {{ $attributes->merge(['class' => 'error text-xs text-red-600 mt-2']) }}>{{ $message }}</p>
@enderror