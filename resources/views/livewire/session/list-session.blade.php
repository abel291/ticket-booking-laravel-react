<div>
    <x-slot name="header">
        {{ $label_plural }}
    </x-slot>

    <div class="flex flex-col md:flex-row md:justify-between md:items-end gap-2 mb-4">
        <x-table.description-lists :img="$event->card" title="Infomracion del evento" :data="[
            'Nombre' => $event->title,
            'Categoria' => $event->category->name,
            'Sub categoria' => $event->subCategory->name,
        ]" />

        <div class="lg:flex gap-2">
            @livewire('session.create-session', ['event_id' => $event->id, 'label' => $label, 'label_plural' => $label_plural])
        </div>
    </div>

    <x-content>
        <x-table.table :data="$list" wire:target="search">

            <thead>
                <tr>
                    @php
                        $tableNamesHead = [
                            'name' => 'Fecha',
                            'ticket_type' => 'Tipos de tickets',
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
                    <tr class="text-sm">

                        <td class="whitespace-nowrap">
                            {{-- <x-table.title-image :img="$item->img" :title="$item->name" :sub-title="$item->slug"
                                :path="route('search', ['categories[]' => $item->slug])" /> --}}
                            <x-date-format :date="$item->date" />
                        </td>
                        <td>
                            @foreach ($item->ticket_types as $ticket_type)
                                <x-badge color="blue">{{ $ticket_type->name }}
                                    @if ($ticket_type->price)
                                        @money($ticket_type->price)
                                    @endif
                                </x-badge>
                            @endforeach
                        </td>

                        <td class="text-gray-500 font-medium ">
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
    {{--  --}}
</div>
