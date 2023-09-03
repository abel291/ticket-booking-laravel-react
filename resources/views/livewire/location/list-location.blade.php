<div>
    <x-slot name="header">
        {{ __($label_plural) }}
    </x-slot>
    <div class="flex flex-col md:flex-row md:justify-end md:items-end gap-2 mb-4">
        @livewire('location.create-location', ['label' => $label, 'label_plural' => $label_plural])
    </div>

    <div>
        <x-content>
            <x-table.table :data="$list" wire:target="search">
                <thead>
                    <tr>

                        @php
                            $tableNamesHead = [
                                'name' => 'Nombre',
                                'address' => 'Direccion',
                                'sessions' => 'Eventos Asociados',
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
                                <x-table.title-image :title="$item->name" :sub-title="$item->phone" />
                            </td>
                            <td>
                                {{ $item->address }}
                            </td>

                            <td>
                                {{ $item->events_count }}
                            </td>

                            <td>
                                <x-badge-active :active="$item->active" />
                            </td>

                            <td>
                                <x-date-format :date="$item->updated_at" />
                            </td>

                            <td class="px-6 py-3  text-right font-medium whitespace-nowrap">

                                <a x-data href="#" class="font-medium text-indigo-600 hover:text-indigo-900"
                                    x-on:click="$dispatch('open-modal-edit',{{ $item->id }})">Editar</a>

                                <a x-data href="#" class="font-medium text-red-600 hover:text-red-900 ml-3 "
                                    x-on:click="$dispatch('open-modal-confirmation-delete',{{ $item->id }});console.log({{ $item->id }})">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </x-table.table>
        </x-content>


    </div>
</div>
