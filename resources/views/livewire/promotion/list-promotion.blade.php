<div>
    <x-slot name="header">
        {{ __($label_plural) }}
    </x-slot>
    <div>
        <div>
            <x-list-data :data="$data" :fields="['Codigo','Cantidad', 'Tipo', 'Expiracion', 'Activo']">

                <x-slot name="component_create">
                    @livewire('promotion.create-promotion',['label'=>$label,'label_plural'=>$label_plural])
                </x-slot>

                <x-slot name="table_body">
                    @foreach ($data as $item)
                        <tr wire:key="button-{{ $item->id }}">

                            <td class="px-6 py-3 ">
                                <div class="font-medium text-gray-900">
                                    {{ $item->code }}
                                </div>
                            </td>
                            <td class="px-6 py-3 ">
                                <span class="font-mediumtext-gray-500">{{ $item->quantity }}</span>
                            </td>

                            <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-500">
                                @if (\App\Enums\PromotionType::PERCENT->value == $item->type)
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        Porcentaje - {{ $item->value }}%
                                    </span>
                                @else
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                        Valor - {{ Helpers::format_price($item->value) }}
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-3  ">
                                <div class="text-gray-500">
                                    {{ $item->expired->format('Y-m-d g:i A') }}
                                </div>

                            </td>

                            <td class="px-6 py-3  ">
                                <x-badge-active :active="$item->active" />

                            </td>
                            <td class="px-6 py-3  ">
                                <div class="text-gray-500">
                                    {{ $item->updated_at->format('Y-m-d h:i A') }}
                                </div>

                            </td>

                            <td class="px-6 py-3  text-right font-medium whitespace-nowrap">
                                <a href="#" class="font-medium text-indigo-600 hover:text-indigo-900" x-data
                                    x-on:click="$dispatch('open-modal-edit',{{ $item->id }})">Edit</a>

                                <a href="#" class="font-medium text-red-600 hover:text-red-900 ml-3 " x-data
                                    x-on:click="$dispatch('open-modal-confirmation-delete',{{ $item->id }});console.log({{ $item->id }})">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </x-slot>

            </x-list-data>


        </div>

    </div>
</div>
