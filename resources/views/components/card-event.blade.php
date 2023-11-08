@props(['event'])

@php
    $ticketSold = $event->session->ticket_types->sum(function ($ticket_type) {
        return $ticket_type->order_tickets->sum('quantity');
    });
    $ticketQuantity = $event->session->ticket_types_available->sum('quantity');

    $percentTickectSold = round(($ticketSold * 100) / $ticketQuantity);
@endphp
<div {{ $attributes->merge(['class' => 'bg-white/70 dark:bg-gray-800  rounded-lg']) }}>
    <div class="p-3 text-gray-900 dark:text-gray-100">
        <div class="flex gap-3 items-stretch">
            <div class="w-4/12">
                <img src="{{ $event->thum }}" class="rounded-lg aspect-square object-cover h-24 max-w-full w-full ">
            </div>
            <div class="w-8/12 py-1.5">
                <div class="flex flex-col justify-between h-full">
                    <div>
                        <div class="text-xs  text-gray-400">
                            {{ $event->session->date->isoFormat('DD MMM YYYY hh:mm A') }}</div>
                        <a href={{ route('event', $event->slug) }}>
                            <h3 class="text-sm font-semibold truncate mt-1.5">{{ $event->title }}</h3>
                        </a>
                    </div>
                    <div class="mt-3">
                        <div class="w-8/12 bg-gray-200 rounded-full h-0.5 dark:bg-gray-700">
                            <div class="bg-gray-400 h-0.5 rounded-full" style="width: {{ $percentTickectSold }}%"></div>
                        </div>
                        <p class="text-xs font-light text-gray-400 mt-2">
                            {{ $ticketSold }} / {{ $ticketQuantity }}
                            ticket vendidos
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
