<div>
    <x-slot name="header">
        {{ __($label_plural) }}
    </x-slot>

    <div class="flex flex-col md:flex-row md:justify-end md:items-end gap-2 mb-4">


        <a class="btn btn-primary" href="{{ route('dashboard.event-create') }}">Agregar {{ $label }}</a>
    </div>
    <div>

        <x-content>
            <x-table.table :data="$list" wire:target="search">
                <thead>
                    <tr>
                        @php
                            $tableNamesHead = [
                                'name' => 'Nombre - Tipo',
                                'tickets_count' => 'Compras de Tickets',
                                'sessions' => 'Sessiones',
                                'ticket_types' => 'Tipos Tickets',
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
                                <x-table.title-image :img="$item->thum" :title="$item->title" :path="route('event', $item->slug)"
                                    :sub-title="$item->category->name" />

                            </td>

                            <td class="text-sm text-gray-500">
                                <div>
                                    Cancelados:
                                    {{ $item->orders->where('status', \App\Enums\OrderStatus::CANCELED)->count() }}
                                </div>
                                <div>
                                    Exitosos:
                                    {{ $item->orders->where('status', \App\Enums\OrderStatus::SUCCESSFUL)->count() }}
                                </div>
                                <div>
                                    Reembolsados:
                                    {{ $item->orders->where('status', \App\Enums\OrderStatus::REFUNDED)->count() }}
                                </div>
                            </td>

                            <td>
                                {{ $item->sessions->count() }}
                            </td>
                            <td>
                                {{ $item->ticket_types->count() }}
                            </td>

                            <td>
                                <x-badge-active :active="$item->active" />
                            </td>

                            <td>
                                <x-date-format :date="$item->updated_at" />
                            </td>

                            <td class="text-right whitespace-nowrap">
                                <div class="flex items-center gap-x-2">
                                    <x-dropdown width="48">
                                        <x-slot name="trigger">
                                            <button type="button"
                                                class="font-medium text-indigo-600 hover:text-indigo-900 flex items-center">
                                                Editar
                                                <svg class="ml-1  h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </x-slot>

                                        <x-slot name="content">
                                            <div class="text-left">
                                                <x-dropdown-link href="{{ route('dashboard.event-edit', $item->id) }}">
                                                    <div class="flex items-center">
                                                        <x-heroicon-o-information-circle class="w-5 mr-2" />
                                                        Datos Basicos
                                                    </div>

                                                </x-dropdown-link>

                                                <x-dropdown-link href="{{ route('dashboard.sessions', $item->id) }}">
                                                    <div class="flex items-center">
                                                        <x-heroicon-o-calendar-days class="w-5 mr-2" />
                                                        Sesiones
                                                    </div>

                                                </x-dropdown-link>
                                                <x-dropdown-link
                                                    href="{{ route('dashboard.ticket-types', $item->id) }}">
                                                    <div class="flex items-center">
                                                        <x-heroicon-o-ticket class="w-5 mr-2" />
                                                        Tipos Tickets
                                                    </div>
                                                </x-dropdown-link>


                                            </div>

                                        </x-slot>
                                    </x-dropdown>
                                    <a href="#" class="font-medium text-red-600 hover:text-red-900 " x-data
                                        x-on:click="$dispatch('open-modal-confirmation-delete',{{ $item->id }})">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </x-table.table>
        </x-content>
        {{--  --}}
    </div>
