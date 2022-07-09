<div>
    <x-slot name="header">
        {{ $label_plural }} del evento <span class="text-blue-500">{{ $event->name }}</span>
    </x-slot>

    <div class="flex gap-2 ">

        <img class="w-40 rounded " src="/storage{{ $event->card }}" alt="">
        <div class="flex gap-2">
            <span class="font-medium">Evento:</span>
            <span><span class="">{{ $event->title }}</span></span>
        </div>
    </div>
    <x-list-data :data="$data" :fields="['Nombre ', 'Cantidad', 'Tipo de Ticket', 'Precio', 'Activo']">

        <x-slot name="component_create">
            @livewire('ticket-type.create-ticket-type', ['event_id' => $event->id, 'label' => $label, 'label_plural' => $label_plural])
        </x-slot>

        <x-slot name="table_body">
            @foreach ($data as $item)
                <tr wire:key="button-{{ $item->id }}">

                    <td class="px-6 py-3 ">
                        <div class="font-medium text-gray-900">
                            {{ $item->name }}
                        </div>
                    </td>

                    <td class="px-6 py-3">
                        {{ $item->quantity }}
                    </td>

                    <td class="px-6 py-3">
                        {{ $item->type->text() }}
                    </td>

                    <td class="px-6 py-3">
                        <x-money amount="{{ $item->price }}" currency="USD" convert />
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
