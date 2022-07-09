<div>
    <x-slot name="header">
        {{ __($label_plural) }}
    </x-slot>
    <div>
        <div>
            
            <x-list-data :data="$data" :fields="['Titulo - Subtitulo', 'Categorias', 'Activo']">

                <x-slot name="component_create">
                    @livewire('blog.create-blog',['label'=>$label,'label_plural'=>$label_plural])
                </x-slot>

                <x-slot name="table_body">
                    @foreach ($data as $item)
                        <tr wire:key="button-{{ $item->id }}">

                            <td class="px-6 py-3">
                                <div class="font-medium text-gray-900">
                                    <a href="#" class="text-blue-500 underline" target="_blank">{{ $item->title }}</a>
                                </div>
                                <div class="text-gray-500 text-xs">
                                    {{ $item->desc_min }}
                                </div>
                            </td>

                            <td class="px-6 py-3">
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($item->categories as $category)
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-700">
                                        {{$category->name}}
                                    </span>
                                @endforeach
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
                                    x-on:click="$dispatch('reset-input-image');$dispatch('open-modal-edit',{{ $item->id }})">Editar</a>

                                <a href="#" class="font-medium text-red-600 hover:text-red-900 ml-3 " x-data
                                    x-on:click="$dispatch('open-modal-confirmation-delete',{{ $item->id }})">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </x-slot>

            </x-list-data>
        </div>
    </div>
</div>
