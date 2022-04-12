<fieldset class="border border-gray-300 p-4 rounded-lg">
    <legend class="px-2 uppercase">
        ceo
    </legend>
    <div class="grid grid-cols-1 gap-4">
        <div>
            <x-form.label class="block">ceo_title</x-form.label>
            <div>
                <x-form.input required type="text" class="w-full" wire:model.defer="event.ceo_title" />
                <x-form.input-error for="event.ceo_title" />
            </div>
        </div>
        <div>
            <x-form.label class="block">ceo_description</x-form.label>
            <div>
                <x-form.input required type="text" class="w-full" wire:model.defer="event.ceo_desc" />
                <x-form.input-error for="event.ceo_desc" />
            </div>
        </div>
    </div>

</fieldset>