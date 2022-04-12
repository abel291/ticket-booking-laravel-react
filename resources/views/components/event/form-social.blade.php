<fieldset class="border border-gray-300 p-4 rounded-lg">
    <legend class="px-2 uppercase">
        Redes Sociales
    </legend>
    <div class="grid grid-cols-1 gap-4">
        <div>
            <x-form.label class="block">Facebook</x-form.label>
            <div>
                <x-form.input required type="text" class="w-full" wire:model.defer="event.social_fa" />
                <x-form.input-error for="event.social_fa" />
            </div>
        </div>
        <div>
            <x-form.label class="block">Twiter</x-form.label>
            <div>
                <x-form.input required type="text" class="w-full" wire:model.defer="event.social_tw" />
                <x-form.input-error for="event.social_tw" />
            </div>
        </div>
        <div>
            <x-form.label class="block">Youtube</x-form.label>
            <div>
                <x-form.input required type="text" class="w-full" wire:model.defer="event.social_yt" />
                <x-form.input-error for="event.social_yt" />
            </div>
        </div>
    </div>

</fieldset>
