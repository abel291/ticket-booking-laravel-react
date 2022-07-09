<div>
    <x-slot name="header">
        {{ __($label_plural) }}
    </x-slot>
    <div>
        <div>
            <x-list-data :data="$data" :fields="['Nombre - Direccion', 'Eventos Asociados', 'Activo']">

                <x-slot name="component_create">
                    @livewire('location.create-location',['label'=>$label,'label_plural'=>$label_plural])
                </x-slot>

                <x-slot name="table_body">
                    @foreach ($data as $item)
                        <tr wire:key="button-{{ $item->id }}">

                            <td class="px-6 py-3 ">

                                <div class="font-medium text-gray-900">
                                   {{ $item->name }}
                                </div>
                                <div class="text-gray-500">
                                    {{ $item->address }}
                                </div>

                            </td>
                            <td class="px-6 py-3">
                                {{ $item->events_count }}

                            </td>

                            <td class="px-6 py-3">
                                <x-table.badge-active :active="$item->active" />

                            </td>
                            <td class="px-6 py-3">
                                <div class="text-gray-500">
                                    {{ $item->updated_at }}
                                </div>

                            </td>

                            <td class="px-6 py-3  text-right font-medium whitespace-nowrap">
                                <a href="#" class="font-medium text-indigo-600 hover:text-indigo-900" x-data
                                    x-on:click="$dispatch('open-modal-edit',{{ $item->id }})">Editar</a>

                                <a href="#" class="font-medium text-red-600 hover:text-red-900 ml-3 " x-data
                                    
                                    x-on:click="$dispatch('open-modal-confirmation-delete',{{ $item->id }});console.log({{ $item->id }})">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </x-slot>

            </x-list-data>


        </div>

    </div>
</div>
