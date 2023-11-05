<div>
    <x-slot name="header">
        <h2>{{ $label_plural }}</h2>
    </x-slot>


    <x-content>
        <div>
            <x-form.title>Datos Basicos</x-form.title>
            <x-form.grid>

                <div class="lg:col-span-3">
                    <x-form.input-label-error wire:model.defer="event.title">
                        Nombre
                    </x-form.input-label-error>
                </div>

                <div class="lg:col-span-3">
                    <x-form.input-label-error wire:model.defer="event.slug">
                        Url
                    </x-form.input-label-error>
                </div>

                <div class="lg:col-span-1">
                    <x-form.input-label for="event.duration">Duracion</x-form.input-label>
                    <x-form.text-input id="event.duration" wire:model.defer="event.duration" />
                    <span class="text-xs text-gray-400">ejemplo: "3 hrs 13 mins"</span>
                    <x-form.input-error for="event.duration" />
                </div>

                {{-- <div class="lg:col-span-1">
                    @if ($isEdit)
                        <x-form.select-active required wire:model.defer="event.active" />
                    @endif
                </div> --}}

                <div class="lg:col-span-2">
                    <x-form.select required wire:model.defer="event.sub_category_id" label="Categoria">
                        <option>Seleccione una Categoria</option>
                        @foreach ($categories as $key => $category)
                            <optgroup label="{{ $category->name }}">
                                @foreach ($category->subCategories as $key => $subCategory)
                                    <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </x-form.select>
                </div>

                <div class="lg:col-span-4">
                    <x-form.select required wire:model.defer="event.location_id" label="Recintos">
                        @foreach ($locations as $key => $location)
                            <option wire:key={{ $location->id }} value="{{ $location->id }}">{{ $location->name }}
                                {{ $location->address }}</option>
                        @endforeach
                    </x-form.select>
                </div>

                <div class="lg:col-span-6">
                    <x-form.input-label-error wire:model.defer="event.entry">
                        Descripcion corta
                    </x-form.input-label-error>
                </div>

                <div class="lg:col-span-6">
                    <x-form.trix wire:model.defer="event.description">
                        Descripcion larga
                    </x-form.trix>
                </div>
                <div class="lg:col-span-2">
                    <x-form.input-file :temp="$banner" model="banner" :saved="$event->banner" label="Banner" />
                </div>
                <div class="lg:col-span-2">
                    <x-form.input-file :temp="$card" model="card" :saved="$event->card" label="Card" />
                </div>
                <div class="lg:col-span-2">
                    <x-form.input-file :temp="$thum" model="thum" :saved="$event->thum" label="Imagen pequeña" />
                </div>
            </x-form.grid>

            {{-- <div class="flex items-center gap-2 py-6 ">
                <button class="py-2 px-3 rounded-md font-medium"
                    x-bind:class="tab == 'form' ? 'bg-gray-200 text-gray-800' : 'text-gray-500'"
                    x-on:click="tab='form' ">Datos</button>

                <button class="py-2 px-4 rounded-md font-medium"
                    x-bind:class="tab == 'images' ? 'bg-gray-200 text-gray-800' : 'text-gray-500'"
                    x-on:click="tab='images' ">Imagenes</button>

            </div>

            <div x-show="tab=='form'" x-transition.opacity>

            </div>
            <div x-show="tab=='images'" x-transition.opacity>
                <div class="grid grid-cols-1 gap-6">

                    <div wire.key="banner">
                        <span class="block font-medium text-sm text-gray-700">Banner</span>
                        <x-form.image :image="'/storage' . $event->banner" wire:model="banner" />
                        <x-form.input-error for="banner" />
                    </div>
                    <div wire.key="card">
                        <span class="block font-medium text-sm text-gray-700">Card</span>

                        <x-form.image :image="'/storage' . $event->card" wire:model="card" />
                        <x-form.input-error for="card" />
                    </div>
                </div>
            </div> --}}
        </div>

        <div class="text-right py-4">
            <a class="btn btn-secondary" href="{{ route('dashboard.events') }}">
                volver
            </a>

            @if ($isEdit)
                <x-primary-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
                    Editar
                </x-primary-button>
            @else
                <x-primary-button class="ml-2" wire:click="save" wire:loading.attr="disabled">
                    Guardar
                </x-primary-button>
            @endif




        </div>
    </x-content>


</div>
