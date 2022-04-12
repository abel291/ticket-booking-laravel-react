<div class="grid grid-cols-2 gap-4 mb-6">
    <div class="col-span-2">
        <x-form.label class="block">Titulo</x-form.label>
        <div>
            <x-form.input required type="text" class="w-full" wire:model.defer="blog.title" />
            <x-form.input-error for="blog.title" />
        </div>
    </div>
    <div class="col-span-2">
        <x-form.label class="block">URL</x-form.label>
        <div>
            <x-form.input required type="text" class="w-full" wire:model.defer="blog.slug" />
            <x-form.input-error for="blog.slug" />
        </div>
    </div>

    <div class="col-span-2">
        <x-form.label class="block">Descripcion corta</x-form.label>
        <div>
            <x-form.textarea required wire:model.defer="blog.desc_min" />
            <x-form.input-error for="blog.desc_min" />
        </div>
    </div>

    <div class="col-span-2">
        <x-form.label class="block">Descripcion larga</x-form.label>
        <div class="mt-2">

            <x-form.textarea-trix wire:model.defer="blog.desc_max" />
            <x-form.input-error for="blog.desc_max" />
        </div>
    </div>

    <div>
        <x-form.label class="block">Activo</x-form.label>
        <div class="mt-2">
            <x-form.active required wire:model.defer="blog.active" />
            <x-form.input-error for="blog.active" />
        </div>
    </div>
</div>
