<div>
    <x-slot name="header">
        {{ $label_plural }}
    </x-slot>

    <div class="flex gap-2 ">

        <img class="w-40 rounded " src="/storage{{ $event->card }}" alt="">
        <div class="flex gap-2">
            <span class="font-medium">Evento:</span>
            <span><span class="">{{ $event->title }}</span></span>
        </div>
    </div>

    <div class="mt-6">
        <x-list-data :data="$data" :fields="['Fecha', 'Activo']">

            <x-slot name="component_create">
                @livewire('session.create-session', ['event_id' => $event->id, 'label' => $label, 'label_plural' => $label_plural])
            </x-slot>

            <x-slot name="table_body">
                @foreach ($data as $item)
                    <tr wire:key="button-{{ $item->id }}">

                        <td class="px-6 py-3 ">
                            <div class="font-medium text-gray-900 capitalize">
                                <x-table.date :date="$item->date" />
                            </div>
                        </td>

                        <td class="px-6 py-3">
                            <x-table.badge-active :active="$item->active" />
                        </td>

                        <td class="px-6 py-3">
                            <x-table.date :date="$item->updated_at" />
                        </td>

                        <td class="px-6 py-3  text-right font-medium whitespace-nowrap">
                            <a x-data href="#" class="font-medium text-indigo-600 hover:text-indigo-900"
                                x-on:click="$dispatch('open-modal-edit',{{ $item->id }})">Editar</a>

                            <a x-data href="#" class="font-medium text-red-600 hover:text-red-900 ml-3 "
                                x-on:click="$dispatch('open-modal-confirmation-delete',{{ $item->id }});console.log({{ $item->id }})">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            </x-slot>

        </x-list-data>
    </div>
</div>
