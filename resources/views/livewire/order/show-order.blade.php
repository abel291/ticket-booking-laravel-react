<div>
    <x-slot name="header">
        Pedido #{{ $order->code }}
    </x-slot>
    <div>
        <x-content>
            <div class="">
                <div class="px-4 pb-4 sm:px-0">
                    <h3 class="text-base font-semibold leading-7 text-gray-900">Datos de Evento</h3>
                </div>
                <dl class="grid lg:grid-cols-2 max-w-4xl">
                    <x-description-lists title="Nombre" :value="$order->data->event->title" />
                    <x-description-lists title="Direccion" :value="$order->data->event->location_name" />
                    <x-description-lists title="Duracion" :value="$order->data->event->duration" />
                    <x-description-lists title="Fecha del evento" :value="$order->session->date->isoFormat('dddd, MMMM D, YYYY h:mm A')" />
                </dl>

            </div>

            <div class="mt-8">
                <div class="px-4 pb-4 sm:px-0">
                    <h3 class="text-base font-semibold leading-7 text-gray-900">Informacion de pago</h3>
                </div>
                <dl class="grid lg:grid-cols-2 max-w-4xl">
                    <x-description-lists title="Nombre" :value="$order->data->user->name" />
                    <x-description-lists title="Telefono" :value="$order->data->user->phone ? $order->data->user->phone : $order->user->phone" />
                    <x-description-lists title="Email" :value="$order->data->user->email ? $order->data->user->email : $order->data->user->email" />
                    <x-description-lists title="Fecha de pago" :value="$order->created_at->isoFormat('dddd, MMMM D, YYYY h:mm A')" />
                    <x-description-lists title="Estado">
                        <x-slot:value>
                            <div class="text-sm mt-1">
                                <x-badge :color="$order->status->color()">
                                    <div class="inline-flex items-center">
                                        <span>{{ $order->status->text() }}</span>
                                        @svg($order->status->icon(), 'ml-1 h-4 w-4')
                                    </div>
                                </x-badge>
                            </div>
                        </x-slot>
                    </x-description-lists>
                    <x-description-lists title="Archivos adjuntos">
                        <x-slot:value>

                            <ul role="list mt-1">
                                <li class="flex items-center">
                                    <div class="flex items-center">
                                        <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <div class="ml-2">
                                            <span class="truncate font-medium">{{ $order->code }}.pdf</span>
                                        </div>
                                    </div>
                                    <div class="ml-4 ">
                                        <a href="{{ route('profile.order_details_pdf', $order->code) }}"
                                            class="font-medium text-indigo-600 hover:text-indigo-500">Ver
                                            boletos</a>
                                    </div>
                                </li>
                            </ul>

                        </x-slot>
                    </x-description-lists>
                </dl>
            </div>


            <div class="mt-10 max-w-4xl">
                <table class="table-list w-full">
                    <thead>
                        <tr>
                            <th class="text-gray-800 bg-gray-100 p-4 text-start font-semibold">Tipos Boletos</th>
                            <th class="text-gray-800 bg-gray-100 p-4 text-start font-semibold">Precio</th>
                            <th class="text-gray-800 bg-gray-100 p-4 text-start font-semibold">Cantidad</th>
                            <th class="text-gray-800 bg-gray-100 p-4 text-start font-semibold ">Monto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->order_tickets as $ticket)
                            <tr>
                                <td>
                                    {{ $ticket->name }}
                                </td>
                                <td>@money($ticket->price)</td>
                                <td>{{ $ticket->quantity }}</td>
                                <td>@money($ticket->total)</td>
                            </tr>
                        @endforeach
                        {{-- <tr>
                            <td></td>
                            <td></td>
                            <td class="text-gray-500 text-right">Sub total:</td>
                            <td class="font-medium">@money($order->sub_total)</td>
                        </tr>
                        @if ($order->data->promotion)
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="text-gray-500 text-right">
                                    Promocion {{ $order->data->promotion->value }}%:</td>
                                <td class="font-medium">@money($order->sub_total)</td>
                            </tr>
                        @endif

                        <tr>
                            <td></td>
                            <td></td>
                            <td class="text-gray-500 text-right">
                                Estimación de impuestos {{ $order->fee_porcent }}:
                            </td>
                            <td class=" text-base font-medium"> @money($order->fee)</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="text-gray-500 text-right">
                                Total:
                            </td>
                            <td class="font-bold"> @money($order->total)</td>
                        </tr> --}}
                    </tbody>
                </table>

                <div class="w-full ">
                    <div class="mt-4 flex sm:justify-end pr-3 text-sm">
                        <div class="sm:text-right">
                            <div class="space-y-4">
                                <dl class="grid sm:grid-cols-5 gap-x-3">
                                    <dt class="col-span-3 text-gray-500">Sub total:</dt>
                                    <dd class="whitespace-nowrap col-span-2 font-medium  dark:text-gray-200">
                                        @money($order->sub_total)
                                    </dd>
                                </dl>

                                @if ($order->data->promotion)
                                    <dl class="grid sm:grid-cols-5 gap-x-3 ">
                                        <dt class="col-span-3 text-gray-500">Promocion
                                            {{ $order->data->promotion->value }}%:</dt>
                                        <dd
                                            class="whitespace-nowrap col-span-2 font-medium text-green-500 dark:text-gray-200">
                                            -@money($order->data->promotion->applied)
                                        </dd>
                                    </dl>
                                @endif


                                <dl class="grid sm:grid-cols-5 gap-x-3 ">
                                    <dt class="col-span-3 text-gray-500">
                                        Estimación de impuestos {{ $order->fee_porcent }}:
                                    </dt>
                                    <dd class="whitespace-nowrap col-span-2 font-medium  dark:text-gray-200">
                                        @money($order->fee)
                                    </dd>
                                </dl>

                                <dl class="grid sm:grid-cols-5 gap-x-3 ">
                                    <dt class="col-span-3 text-gray-500">Total:</dt>
                                    <dd class="whitespace-nowrap col-span-2 font-bold  dark:text-gray-200">
                                        @money($order->total)</dd>
                                </dl>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
            <div class="mt-6">

                <a href="{{ route('dashboard.orders') }}">
                    <x-secondary-button>
                        volver
                    </x-secondary-button>
                </a>
            </div>

        </x-content>

        <!--Modal confirmation delete-->
        <div>
            <div x-data="{
                show: @entangle('open_modal_confirmation').defer,
            }" @open-modal-confirmation-delete.window="show = true">

                <x-modal>
                    <x-slot name="title">
                        Cancelar Pago
                    </x-slot>

                    <x-slot name="content">
                        <p class="mb-2">
                            ¿Estás seguro de que deseas Cancelar este PAGO?
                        </p>
                        @if ($order->total > 0)
                            <div class="flex items-center">
                                <input type="checkbox" id="refund"
                                    class="mr-3 text-red-500 focus:ring-red-500 rounded"
                                    wire:model.defer="refund_checkbox">

                                <label for="refund">
                                    Rembolsar dinero
                                    <span class="text-green-600 font-medium">
                                        @money($order->total)
                                    </span>
                                </label>

                            </div>
                        @endif
                    </x-slot>

                    <x-slot name="footer">
                        <x-secondary-button x-on:click="show=false" wire:loading.attr="disabled">
                            cancelar
                        </x-secondary-button>

                        <x-danger-button class="ml-2" x-on:click="$wire.delete({{ $order->id }})"
                            wire:loading.attr="disabled">
                            <span wire:loading.class="hidden" wire:target="delete">Cancelar Pago</span>
                            <span wire:loading wire:target="delete"> Cancelando... </span>
                        </x-danger-button>
                    </x-slot>
                </x-modal>
            </div>
        </div>
    </div>
</div>
