@props(['label' => '', 'text' => '', 'id' => uniqid()])

<div class="flex ">
    <div class="flex h-5 items-center">
        <input type="checkbox" id="{{ $id }}"
            {{ $attributes->class('h-5 w-5 rounded border-gray-300 text-primary focus:ring-primary') }}>
    </div>
    <div class="ml-3 text-sm">
        @if ($label)
            <label for="{{ $id }}" class="font-medium text-gray-700">{{ $label }}</label>
        @endif
        @if ($text)
            <p class="text-gray-500">{{ $text }}</p>
        @endif
    </div>
</div>
