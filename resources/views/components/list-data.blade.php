<div>
    <div class="pb-6">
        <div class=" max-w-7xl mx-auto sm:px-4 lg:px-8">
            <div class="mb-2">
                <div class="flex justify-between">
                    <div class="flex mb-2 items-center">
                        <x-jet-input wire:model.debounce.500ms="search" class="mr-4" placeholder="buscador">
                        </x-jet-input>
                        <div wire:loading wire:target="search">
                            <svg class="animate-spin -ml-1 mr-3 h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    {{ $component_create }}
                </div>
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" wire:click="sortBy('id')"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                                                ID

                                            </th>
                                            @foreach ($fields as $field)
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    {{ $field }}
                                                </th>
                                            @endforeach
                                            <th scope="col" class="relative px-6 py-3">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @if ($data->isNotEmpty())
                                            {{ $table_td }}
                                        @else
                                            <tr>
                                                <td colspan="3" class="px-6 py-3 ">No hay registros</td>
                                            </tr>
                                        @endif

                                        <!-- More items... -->
                                    </tbody>
                                </table>

                                {{ $data->links() }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
