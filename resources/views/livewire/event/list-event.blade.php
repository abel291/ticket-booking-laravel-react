<div>
    <x-slot name="header">
        {{ __($label_plural) }}
    </x-slot>
    <div>
        <div>

            <x-list-data :data="$data" :fields="['Nombre - Slug', 'Compras de Tickets', 'Categoria', 'Activo']">

                <x-slot name="component_create">

                    <a href="{{ route('dashboard.create-event') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                        Agregar {{ $label }}
                    </a>

                </x-slot>

                <x-slot name="table_body">
                    @foreach ($data as $item)
                        <tr wire:key="button-{{ $item->id }}">

                            <td class="px-6 py-3">
                                <div class="font-medium text-gray-900">
                                    <a href="#" class="text-blue-500 underline" target="_blank">{{ $item->name }}</a>
                                </div>
                                <div class="text-gray-500 text-xs">
                                    {{ $item->type->value }}
                                </div>
                            </td>
                            <td class="px-6 py-3 text-xs text-gray-500">

                                <div>
                                    Cancelados
                                    :
                                    {{ $item->payments->where('type', \App\Enums\PaymentStatus::CANCELED->value)->count() }}
                                </div>
                                <div>
                                    Exitosos
                                    :
                                    {{ $item->payments->where('type', \App\Enums\PaymentStatus::REFUNDED->value)->count() }}
                                </div>
                                <div>
                                    Reembolsados
                                    :
                                    {{ $item->payments->where('type', \App\Enums\PaymentStatus::SUCCESSFUL->value)->count() }}
                                </div>


                            </td>

                            <td class="px-6 py-3">
                                <div class="flex flex-wrap gap-2">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-700">
                                        {{ $item->category->name }}
                                    </span>

                                </div>
                            </td>

                            <td class="px-6 py-3">
                                <x-table.badge-active :active="$item->active" />
                            </td>

                            <td class="px-6 py-3">
                                <x-table.date :date="$item->updated_at" />
                            </td>

                            <td class="px-6 py-3  text-right font-medium whitespace-nowrap">
                                <a href="#" class="font-medium text-indigo-600 hover:text-indigo-900" x-data
                                    x-on:click="$dispatch('reset-input-image');$dispatch('open-modal-edit',{{ $item->id }})">Edit</a>

                                <a href="#" class="font-medium text-red-600 hover:text-red-900 ml-3 " x-data
                                    x-on:click="$dispatch('open-modal-confirmation-delete',{{ $item->id }})">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </x-slot>

            </x-list-data>
        </div>
    </div>
</div>
