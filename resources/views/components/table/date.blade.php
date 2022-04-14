@props(['date'])
<div class="text-gray-500">
    {{ $date->format('d-m-Y h:i A') }}
</div>