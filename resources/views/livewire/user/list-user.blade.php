<div>
    <x-slot name="header">
        {{ __($label_plural) }}
    </x-slot>
    <div>
        <x-list-data :data="$data" :fields="['Nombre - email', 'Telefono', 'Activo']">
            <x-slot name="component_create">
                @livewire('user.create-user',['label'=>$label,'label_plural'=>$label_plural])
            </x-slot>
            <x-slot name="table_body">
                @foreach ($data as $item)
                    <tr>

                        <td class="px-6 py-3 ">
                            <div class="font-medium text-gray-900">
                                {{ $item->name }}
                            </div>
                            <div class="text-gray-500">
                                {{ $item->email }}
                            </div>

                        </td>
                        <td class="px-6 py-3 ">

                            {{ $item->phone }}
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
                            <button class="font-medium text-indigo-600 hover:text-indigo-900" x-data="{ id: {{ $item->id }} }"
                                x-on:click="$dispatch('open-modal-edit',id)">Editar</button>

                            <a href="#" class="font-medium text-red-600 hover:text-red-900 ml-3 " x-data="{ id: {{ $item->id }} }"
                                x-on:click="$dispatch('open-modal-confirmation-delete',id)">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            </x-slot>
        </x-list-data>
    </div>
</div>
