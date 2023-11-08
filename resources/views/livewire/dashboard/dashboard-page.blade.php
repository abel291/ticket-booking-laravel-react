@section('title', 'Dashboard')

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Dashboard') }}
    </h2>
</x-slot>

<div class="">
    <div>
        <div>
            <h3 class="text-base font-semibold leading-6">Últimos 30 días</h3>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-8 gap-5 mt-2">

            <div class="lg:col-span-2">
                <x-content class="w-full">
                    <dt class="text-gray-500 font-medium text-sm">Total Ingresos</dt>
                    <dd class="text-3xl text-gray-900 tracking-tight font-semibold mt-1">
                        @money($totalRevenue)
                    </dd>
                </x-content>
            </div>

            <div class="lg:col-span-2">
                <x-content class="w-full">
                    <dt class="text-gray-500 font-medium text-sm">Tickets vendidos</dt>
                    <dd class="text-3xl text-gray-900 tracking-tight font-semibold mt-1">
                        {{ number_format($ticketSold) }}</dd>
                </x-content>
            </div>

            <div class="lg:col-span-2">
                <x-content class="w-full">
                    <dt class="text-gray-500 font-medium text-sm">Valor promedio del pedido</dt>
                    <dd class="text-3xl text-gray-900 tracking-tight font-semibold mt-1">
                        @money($averageOrderValue)
                    </dd>
                </x-content>
            </div>

            <div class="lg:col-span-2">
                <x-content class="w-full h-full ">
                    <dt class="text-gray-500 font-medium text-sm">Eventos activos</dt>
                    <dd class="text-2xl text-gray-900 tracking-tight font-semibold mt-1">
                        {{ number_format($eventsCount) }}
                    </dd>
                </x-content>
            </div>
        </div>
    </div>

    <div class="mt-12">
        <div>
            <h3 class="text-base font-semibold leading-6">Proximos eventos</h3>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 mt-2">

            @foreach ($events as $event)
                <x-card-event :event="$event" />
            @endforeach
        </div>
    </div>

    <div class="mt-12">
        <div>
            <h3 class="text-base font-semibold leading-6">Ordenes reciente</h3>
        </div>
        <x-content class="mt-2">
            <table class="w-full table-list table-auto">
                <thead>
                    <tr>
                        @php
                            $tableNamesHead = [
                                'name' => '#Orden',
                                'created_at' => 'Fecha de compra',
                                'event.title' => 'Evento',
                                'user.name' => 'Cliente',
                                'active' => 'Activo',
                                'total' => 'Monto',
                            ];
                        @endphp

                        @foreach ($tableNamesHead as $key => $name)
                            <x-table.th :name="$name" />
                        @endforeach

                    </tr>
                </thead>

                <tbody>
                    @foreach ($orders->take(10) as $item)
                        <tr wire:key="button-{{ $item->id }}">
                            <td class="font-medium">
                                #{{ $item->code }}
                            </td>
                            <td>
                                <x-date-format :date="$item->created_at" />
                            </td>
                            <td class="font-semibold ">
                                {{ $item->data->event->title }}
                            </td>
                            <td class="font-semibold  ">
                                {{ $item->data->user->name }}
                            </td>

                            <td>
                                <x-badge :color="$item->status->color()">
                                    <div class="inline-flex items-center">
                                        <span>{{ $item->status->text() }}</span>
                                        @svg($item->status->icon(), 'ml-1 h-4 w-4')
                                    </div>
                                </x-badge>

                            </td>



                            <td class=" whitespace-nowrap font-semibold  ">
                                @money($item->total)
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-content>

    </div>



</div>

{{-- @push('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const chartRegisterUsers = document.getElementById('chart-register-users');
        const chartOrderCategory = document.getElementById('chart-order-category');

        const getDaysInMonth = () => {
            let daysCount = new Date(
                new Date().getFullYear(),
                new Date().getMonth() + 1,
                0
            ).getDate();

            return Array.from({
                length: daysCount
            }, (_, i) => i + 1)
        };


        const arrayDaysInMonth = getDaysInMonth();
        new Chart(chartRegisterUsers, {
            type: 'bar',
            data: {
                labels: arrayDaysInMonth,
                datasets: [{
                    label: 'Usuarios Registrados',
                    data: [12, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3],
                    backgroundColor: ['#3b82f6']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        new Chart(chartOrderCategory, {
            type: 'bar',
            data: {
                labels: @json($product_category->keys()->toArray()),
                datasets: [{
                    label: 'Ventas',
                    data: @json($product_category->values()->toArray()),
                    backgroundColor: ['#3b82f6']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }


        });
    </script>
@endpush --}}
