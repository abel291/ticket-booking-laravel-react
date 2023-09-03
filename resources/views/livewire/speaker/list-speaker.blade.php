<div>
    <x-slot name="header">
        {{ __($label_plural) }} Seleccionados
    </x-slot>
    <div>
        <x-list-data :data="$data" :fields="['Nombre - email', 'Posicion', 'twitter']">
            <x-slot name="component_create">
                <div class="inline-flex gap-3">
                    @livewire('speaker.create-speaker', ['event_id' => $event->id, 'label' => $label, 'label_plural' => $label_plural])
                    @if ($event->id)
                        @livewire('speaker.list-availables-speaker', ['event_id' => $event->id, 'label' => $label, 'label_plural' => $label_plural])
                    @endif

                </div>
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
                                        {{ $item->email }}
                                    </div>
                                </div>
                            </div>

                        </td>
                        <td class="px-6 py-3 ">
                            {{ $item->position }}
                        </td>

                        <td class="px-6 py-3 ">
                            {{ $item->twitter }}
                        </td>

                        <td class="px-6 py-3">
                            <div class="text-gray-500">
                                {{ $item->updated_at->format('Y-m-d h:i A') }}
                            </div>

                        </td>

                        <td class="px-6 py-3  text-right font-medium whitespace-nowrap">
                            @if (!$event->id)
                                <button x-data class="font-medium text-indigo-600 hover:text-indigo-900"
                                    x-on:click="$dispatch('open-modal-edit',{{ $item->id }})">Editar</button>
                            @endif


                            <button class="font-medium text-red-600 hover:text-red-900 ml-3 " x-data
                                x-on:click="$dispatch('open-modal-confirmation-delete',{{ $item->id }})">
                                Eliminar
                            </button>
                        </td>
                    </tr>
                @endforeach
            </x-slot>


        </x-list-data>
    </div>
</div>
