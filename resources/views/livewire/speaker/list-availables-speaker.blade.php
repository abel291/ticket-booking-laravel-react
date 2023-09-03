<div>
    <div x-data="{
        show: @entangle('open').defer,
        edit: false,
    }" @open-modal-edit.window=" show = true;edit= true; $wire.edit($event.detail)">

        <x-primary-button x-on:click="show = true;edit=false;">Seleccionar {{ $label }} de otros
            eventos</x-primary-button>

        <x-modal>

            <x-slot name="title">
                <h2>{{ $label_plural }} Disponilbes</h2>
            </x-slot>
            <x-slot name="content">
                <x-list-data :data="$data" :fields="['Nombre - Position']">
                    <x-slot name="component_create">
                    </x-slot>

                    <x-slot name="table_body">
                        @foreach ($data as $item)
                            <tr wire:key="speakers-{{ $item->id }}">

                                <td class="px-6 py-3 ">
                                    <div class="flex items-center gap-3">
                                        <div>
                                            <img src="/storage{{ $item->img }}" class="w-10 h-10 rounded-full">
                                        </div>
                                        <div>
                                            <div class="font-medium text-gray-900">
                                                {{ $item->name }}
                                            </div>
                                            <div class="text-gray-500">
                                                {{ $item->position }}
                                            </div>
                                        </div>
                                    </div>

                                </td>

                                <td class="px-6 py-3">
                                    <div class="text-gray-500">
                                        {{ $item->updated_at->format('Y-m-d h:i A') }}
                                    </div>

                                </td>

                                <td class="px-6 py-3  text-right font-medium whitespace-nowrap">

                                    <button wire:click="store({{ $item->id }})"
                                        class="font-medium text-blue-600 hover:text-blue-900 ml-3">Agregar</button>

                                </td>
                            </tr>
                        @endforeach
                    </x-slot>


                </x-list-data>
            </x-slot>
            <x-slot name="footer">
                <div class="text-right">
                    <x-secondary-button x-on:click="show=false" wire:loading.attr="disabled">
                        volver
                    </x-secondary-button>

                </div>
            </x-slot>

        </x-modal>
    </div>

</div>
