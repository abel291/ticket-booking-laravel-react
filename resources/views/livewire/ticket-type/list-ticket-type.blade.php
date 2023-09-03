<div>
    <x-slot name="header">
        <div class="flex items-center">
            <x-heroicon-o-ticket class="w-8 mr-2" />
            <span>
                {{ $label_plural }}
            </span>
        </div>
    </x-slot>

    <div class="flex flex-col md:flex-row md:justify-between md:items-end gap-2 mb-4">
        <x-table.description-lists :img="$event->card" title="Infomracion del evento" :data="[
            'Nombre' => $event->title,
            'Categoria' => $event->category->name,
            'Sub categoria' => $event->subCategory->name,
        ]" />

        <div class="lg:flex gap-2">
            @livewire('ticket-type.create-ticket-type', ['event_id' => $event->id, 'label' => $label, 'label_plural' => $label_plural])
        </div>
    </div>
    <x-content>
        <x-table.table :data="$list" wire:target="search">

            <thead>
                <tr>
                    @php
                        $tableNamesHead = [
                            'name' => 'Nombre',
                            'quantity' => 'Cantidad',
                            'type' => 'Tipo de Ticke',
                            'price' => 'Precio',
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

                        <td class="px-6 py-3 ">
                            <div class="font-medium text-gray-900">
                                {{ $item->name }}
                            </div>
                        </td>

                        <td class="px-6 py-3">
                            {{ $item->quantity }}
                        </td>

                        <td class="px-6 py-3">
                            @if ($item->type == App\Enums\TicketTypesEnum::PAID)
                                <x-badge color="green"> {{ $item->type->text() }} </x-badge>
                            @else
                                <x-badge color="gray"> {{ $item->type->text() }} </x-badge>
                            @endif
                        </td>

                        <td class="px-6 py-3">
                            @money($item->price)
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

</div>
