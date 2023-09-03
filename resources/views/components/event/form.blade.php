<x-form.grid>
    <div class="col-span-3">
        <x-form.input-label-error wire:model.defer="event.title">
            Nombre
        </x-form.input-label-error>
    </div>

    <div class="col-span-3">
        <x-form.input-label-error wire:model.defer="event.slug">
            Url
        </x-form.input-label-error>
    </div>

    <div class="col-span-1">
        <x-form.input-label for="event.duration">Duracion</x-form.input-label>
        <x-form.text-input id="event.duration" wire:model.defer="event.duration" />
        <span class="text-xs text-gray-400">ejemplo: "3 hrs 13 mins"</span>
        <x-form.input-error for="event.duration" />
    </div>

    <div class="col-span-1">
        <x-form.select-active required wire:model.defer="event.active" />
    </div>

    <div class="col-span-2">
        <x-form.select required wire:model.defer="event.category_id" label="Categoria">
            <option>Seleccione una Categoria</option>
            @foreach (App\Models\Category::get() as $key => $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </x-form.select>
    </div>

    <div class="col-span-5">
        <x-form.select required wire:model.defer="event.location_id" label="Recintos">
            <option>Seleccione una Categoria</option>
            @foreach ($locations as $key => $location)
                <option value="{{ $location->id }}">{{ $location->name }}</option>
            @endforeach
        </x-form.select>
    </div>

    <div class="col-span-1">
        <x-form.textar required wire:model.defer="event.active" />
    </div>




    {{-- <div class="col-span-4">
        <x-form.label class="block">Descripcion corta</x-form.label>
        <div>
            <x-form.input required type="text" class="w-full" wire:model.defer="event.entry" />
            <x-form.input-error for="event.entry" />
        </div>
    </div>

    <div class="col-span-4">
        <x-form.label class="block">Descripcion larga</x-form.label>
        <div class="mt-2">

            <x-form.textarea-trix wire:model.defer="event.desc_max" />
            <x-form.input-error for="event.desc_max" />
        </div>
    </div>
    <div class="col-span-4">
        <x-event.form-ceo />
    </div>
    <div class="col-span-4">
        <x-event.form-social />
    </div> --}}



</x-form.grid>
