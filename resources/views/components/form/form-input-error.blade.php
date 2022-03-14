@props(['for'])

@error($for)
    <p {{ $attributes->merge(['class' => 'error text-sm text-red-600 mt-2']) }}>{{ $message }}</p>
@enderror