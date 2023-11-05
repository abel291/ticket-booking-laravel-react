@props(['title', 'value'])
<div {{ $attributes->merge(['class' => 'py-4 border-t']) }}>
    <dt class="text-sm font-medium leading-6 text-gray-900">{{ $title }}</dt>
    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $value }}</dd>
</div>
