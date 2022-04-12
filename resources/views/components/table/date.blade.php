@props(['date'])
<div class="text-gray-500">
    {{ $date->format('Y-m-d h:i A') }}
</div>