<div>
    <x-slot name="header">
        {{ __('Categorias') }}
    </x-slot>
    <div>
        <x-list-data :fields="$fields">
            <x-slot name="component_create">
                @livewire('category.create-category')
            </x-slot>
            <x-slot name="table_data">
                @foreach ($data as $item)
                    <tr>
                        <td class="px-6 py-3 text-sm font-medium">
                            {{ $item->id }}
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap">

                            <div class="text-sm font-medium text-gray-900">
                                {{ $item->name }}
                            </div>
                            <div class="text-sm text-gray-500">
                                {{ $item->slug }}
                            </div>

                        </td>
                        <td class="px-6 py-3 whitespace-nowrap">

                            <div class="text-sm text-gray-500">
                                <img class="rounded-lg w-24 object-cover max-w-full"
                                    src="/storage/{{ $item->img }}?{{ rand(1, 100) }}" />
                            </div>
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap ">
                            <div class="text-sm text-gray-500">
                                {{ $item->updated_at }}
                            </div>

                        </td>
                        <td class="px-6 py-3 whitespace-nowrap ">
                            <x-active-item :active="$item->active" />

                        </td>

                        <td class="px-6 py-3 whitespace-nowrap text-right text-sm font-medium">
                            <button class="font-medium text-indigo-600 hover:text-indigo-900"
                                x-on:click="$dispatch('form-edit',{{ $item->id }})">Edit</button>

                            <a href="#" class="font-medium text-red-600 hover:text-red-900 ml-3 " x-on:click="
                            $dispatch('open-modal-confirmation-delete',{{ $item->id }})">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </x-slot>
        </x-list-data>
    </div>
</div>
