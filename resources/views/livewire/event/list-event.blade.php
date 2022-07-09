<div>
    <x-slot name="header">
        {{ __($label_plural) }}
    </x-slot>
    <div>
        <x-list-data :data="$data" :fields="['Nombre - Tipo', 'Compras de Tickets', 'Sessiones','Tipos Tickets', 'Activo']">

            <x-slot name="component_create">
                @livewire('event.create-event',['label'=>$label,'label_plural'=>$label_plural])
            </x-slot>

            <x-slot name="table_body">
                @foreach ($data as $item)
                    <tr wire:key="button-{{ $item->id }}">

                        <td class="px-6 py-3">
                            <div class="font-medium text-gray-900">
                                <span class="">{{ $item->title }}</span>
                            </div>
                            <div class="text-gray-500 text-xs">
                                {{ $item->category->name }}
                            </div>
                        </td>
                        <td class="px-6 py-3 text-xs text-gray-500">
                            <div>
                                Cancelados:
                                {{ $item->payments->where('type', \App\Enums\PaymentStatus::CANCELED->value)->count() }}
                            </div>
                            <div>
                                Exitosos:
                                {{ $item->payments->where('type', \App\Enums\PaymentStatus::REFUNDED->value)->count() }}
                            </div>
                            <div>
                                Reembolsados:
                                {{ $item->payments->where('type', \App\Enums\PaymentStatus::SUCCESSFUL->value)->count() }}
                            </div>
                        </td>

                        <td class="px-6 py-3">
                            {{$item->sessions->count()}}
                        </td>
                        <td class="px-6 py-3">
                            {{$item->ticket_types->count()}}
                        </td>

                        <td class="px-6 py-3">
                            <x-table.badge-active :active="$item->active" />
                        </td>

                        <td class="px-6 py-3">
                            <x-table.date :date="$item->updated_at" />
                        </td>

                        <td class="px-6 py-3  text-right font-medium whitespace-nowrap">
                            <div class="flex items-center gap-x-4">
                                <a class="font-medium text-green-600 hover:text-green-900"
                                    href="{{ route('dashboard.ticket-types', $item->id) }}">Boletos</a>

                                <a class="font-medium text-orange-600 hover:text-green-900"
                                    href="{{ route('dashboard.sessions', $item->id) }}">Sesiones</a>

                                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-900" x-data
                                    x-on:click="$dispatch('open-modal-edit',{{ $item->id }})">Editar</a>


                                <a href="#" class="font-medium text-red-600 hover:text-red-900 " x-data
                                    x-on:click="$dispatch('open-modal-confirmation-delete',{{ $item->id }})">Eliminar</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </x-slot>

        </x-list-data>
    </div>
</div>
