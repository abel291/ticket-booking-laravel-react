<div>
    <x-slot name="header">
        {{ __($label_plural) }}
    </x-slot>
    <div>
        <div>
            <x-list-data :data="$data" :fields="['Nombre', 'Pago', 'tickets comprados', 'estado']">

                <x-slot name="component_create">
                   
                </x-slot>

                <x-slot name="table_body">
                    @foreach ($data as $item)
                        <tr wire:key="button-{{ $item->id }}">
                            <td class="px-6 py-3 md:w-96">
                                <div class="font-medium text-gray-900">

                                    {{ $item->user->name }}
                                </div>
                                <div class="text-gray-500 text-xs">

                                    {{ $item->event->name }}
                                </div>
                            </td>
                            <td class="px-6 py-3   ">
                                <x-money amount="{{ $item->total }}" currency="USD" convert />
                            </td>
                            <td class="px-6 py-3 truncate">
                                <span class="block text-sm text-gray-500"> {{ $item->tickets->sum('quantity') }}
                                </span>
                            </td>
                            <td class="px-6 py-3 truncate text-xs">
                                <x-payment-badge-state :status="$item->status" />
                            </td>

                            <td class="px-6 py-3">
                                <div class="text-gray-500">
                                    {{ $item->updated_at }}
                                </div>
                            </td>

                            <td class="px-6 py-3  text-right font-semibold whitespace-nowrap">
                                <a href="{{ route('dashboard.payments-view', $item->id) }}"
                                    class="text-indigo-600 hover:text-indigo-900">Ver detalles</a>

                                {{-- <a href="#" class="text-red-600 hover:text-red-900 ml-3 " x-data
                                    x-on:click="$dispatch('open-modal-confirmation-delete',{{ $item->id }});console.log({{ $item->id }})">Cancelar</a> --}}
                            </td>
                        </tr>
                    @endforeach
                </x-slot>

            </x-list-data>


        </div>

    </div>
</div>
