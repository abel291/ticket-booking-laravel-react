<div class="grid grid-cols-2 gap-6 mb-6">
    <div class="col-span-2">
        <x-form.label class="block">Nombre</x-form.label>
        <div>
            <x-form.input required type="text" class="w-full" wire:model.defer="event.name" />
            <x-form.input-error for="event.name" />
        </div>
    </div>
    <div class="col-span-2">
        <x-form.label class="block">URL</x-form.label>
        <div>
            <x-form.input required type="text" class="w-full" wire:model.defer="event.slug" />
            <x-form.input-error for="event.slug" />
        </div>
    </div>
    <div>
        <x-form.label class="block">
            Duracion
            <span class="text-xs text-gray-400">ejemplo: "3 hrs 13 mins"</span>
        </x-form.label>
        <div>
            <x-form.input required type="text" class="w-full" wire:model.defer="event.duration" />

            <x-form.input-error for="event.duration" />
        </div>
    </div>    
    {{-- categories --}}
    <div>
        <x-form.label for="category" class="block">Categoria</x-form.label>
        <div class="mt-1">
            <div>
                <x-form.select required wire:model.defer="event.category_id" name="category" id="category">

                    <option>Seleccione una Categoria</option>
                    @foreach (App\Models\Category::get() as $key => $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach

                </x-form.select>
            </div>
            <x-form.input-error for="event.category_id" />
        </div>
    </div>

    {{-- location --}}
    <div class="col-span-2">
        <x-form.label for="location" class="block">Ubicacion</x-form.label>
        <div class="mt-1">
            <div>
                <x-form.select required wire:model.defer="event.location_id" name="category" id="category">

                    <option>Seleccione una Ubicacion</option>
                    @foreach (App\Models\Location::get() as $key => $item)
                        <option value="{{ $item->id }}">{{ $item->name }} ({{ $item->address }})</option>
                    @endforeach

                </x-form.select>
            </div>
            <x-form.input-error for="event.location_id" />
        </div>
    </div>
    <div>
        <x-form.label class="block">Activo</x-form.label>
        <div class="mt-2">
            <x-form.active required wire:model.defer="event.active" />
            <x-form.input-error for="event.active" />
        </div>
    </div>


    <div class="col-span-2">
        <x-form.label class="block">Descripcion corta</x-form.label>
        <div>
            <x-form.input required type="text" class="w-full" wire:model.defer="event.desc_min" />
            <x-form.input-error for="event.desc_min" />
        </div>
    </div>

    <div class="col-span-2">
        <x-form.label class="block">Descripcion larga</x-form.label>
        <div class="mt-2">

            <x-form.textarea-trix wire:model.defer="event.desc_max" />
            <x-form.input-error for="event.desc_max" />
        </div>
    </div>
    <div class="col-span-2">
        <x-event.form-ceo />
    </div>
    <div class="col-span-2">
        <x-event.form-social />
    </div>

    


</div>
