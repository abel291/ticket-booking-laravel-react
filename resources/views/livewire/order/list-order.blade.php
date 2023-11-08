<div>
    <x-slot name="header">
        {{ __($label_plural) }}
    </x-slot>
    <div>

        {{-- <x-list-data :data="$data" :fields="['', '', '', 'Pago', '', 'estado']"> --}}
        <x-content>
            <x-table.table :data="$list" wire:target="search">
                <thead>
                    <tr>
                        @php
                            $tableNamesHead = [
                                'name' => 'Codigo',
                                'event.title' => 'Evento',
                                'user.name' => 'Nombre',
                                'total' => 'Pago',
                                'quantity' => 'Tickets comprados',
                                'active' => 'Activo',
                                'updated_at' => 'Ultima actualización',
                            ];
                        @endphp

                        @foreach ($tableNamesHead as $key => $name)
                            <x-table.th :name="$name" />
                        @endforeach
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($list as $item)
                        <tr wire:key="button-{{ $item->id }}">
                            <td>
                                {{ $item->code }}
                            </td>
                            <td>
                                {{ $item->data->event->title }}
                            </td>
                            <td class=" ">
                                {{ $item->data->user->name }}
                            </td>

                            <td class=" whitespace-nowrap  ">
                                @money($item->total)
                            </td>
                            <td class=" truncate">
                                <span class="block text-sm text-gray-500"> {{ $item->order_tickets_sum_quantity }}
                                </span>
                            </td>
                            <td>
                                <x-badge :color="$item->status->color()">
                                    <div class="inline-flex items-center">
                                        <span>{{ $item->status->text() }}</span>
                                        @svg($item->status->icon(), 'ml-1 h-4 w-4')
                                    </div>
                                </x-badge>

                            </td>

                            <td>
                                <x-date-format :date="$item->updated_at" />
                            </td>

                            <td class="  text-right font-semibold whitespace-nowrap">
                                <a href="{{ route('dashboard.order-show', $item->code) }}"
                                    class="text-indigo-600 hover:text-indigo-900">Ver detalles</a>

                                {{-- <a href="#" class="text-red-600 hover:text-red-900 ml-3 " x-data
                                    x-on:click="$dispatch('open-modal-confirmation-delete',{{ $item->id }});console.log({{ $item->id }})">Cancelar</a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </x-table.table>
        </x-content>

    </div>

</div>
