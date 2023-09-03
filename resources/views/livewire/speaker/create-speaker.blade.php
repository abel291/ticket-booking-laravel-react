<div>
    <div x-data="{
        show: @entangle('open').defer,
        edit: false,
    }" @open-modal-edit.window=" show = true;edit= true; $wire.edit($event.detail)">

        <x-primary-button x-on:click="show = true;edit=false;" wire:click="create">Agregar
            {{ $label }}</x-primary-button>

        <x-modal>

            <x-slot name="title">
                <h2>{{ $label_plural }}</h2>
            </x-slot>
            <x-slot name="content">

                <div class="grid grid-cols-1  lg:grid-cols-2 gap-4 mb-6">
                    <div>
                        <x-form.label for="speaker.name" class="block">Nombre</x-form.label>
                        <div>
                            <x-form.input id="speaker.name" required wire:model.defer="speaker.name" type="text"
                                required class="w-full" />
                            <x-form.input-error for="speaker.name" />
                        </div>
                    </div>
                    <div>
                        <x-form.label for="speaker.email" class="block">Posicion</x-form.label>
                        <div>
                            <x-form.input id="speaker.email" required wire:model.defer="speaker.email" type="text"
                                required class="w-full" />
                            <x-form.input-error for="speaker.email" />
                        </div>
                    </div>

                    <div>
                        <x-form.label for="speaker.position" class="block">Posicion</x-form.label>
                        <div>
                            <x-form.input id="speaker.position" required wire:model.defer="speaker.position"
                                type="text" required class="w-full" />
                            <x-form.input-error for="speaker.position" />
                        </div>
                    </div>

                    <div>
                        <x-form.label for="speaker.website" class="block">Website</x-form.label>
                        <div>
                            <x-form.input id="speaker.website" required wire:model.defer="speaker.website"
                                type="text" required class="w-full" />
                            <x-form.input-error for="speaker.website" />
                        </div>
                    </div>

                    <div>
                        <x-form.label for="speaker.instagram" class="block">Instagram</x-form.label>
                        <div>
                            <x-form.input id="speaker.instagram" required wire:model.defer="speaker.instagram"
                                type="text" required class="w-full" />
                            <x-form.input-error for="speaker.instagram" />
                        </div>
                    </div>

                    <div>
                        <x-form.label for="speaker.twitter" class="block">Twitter</x-form.label>
                        <div>
                            <x-form.input id="speaker.twitter" required wire:model.defer="speaker.twitter"
                                type="text" required class="w-full" />
                            <x-form.input-error for="speaker.twitter" />
                        </div>
                    </div>

                    {{-- <div>
                        <x-form.label class="block">Activo</x-form.label>
                        <div class="mt-2">
                            <x-form.active required wire:model.defer="speaker.active" />
                            <x-form.input-error for="speaker.active" />
                        </div>
                    </div> --}}
                    <div class="lg:col-span-2">
                        <x-form.label for="speaker.desc" class="block">Descripcion</x-form.label>
                        <div>
                            <x-form.textarea id="speaker.desc" required wire:model.defer="speaker.desc" type="text"
                                required class="w-full" />
                            <x-form.input-error for="speaker.desc" />
                        </div>
                    </div>
                    <div>
                        <span class="block font-medium text-sm text-gray-700">Foto</span>
                        <x-form.image :image="$speaker->img" wire:model="img" />
                        <x-form.input-error for="img" />
                    </div>

                </div>

            </x-slot>

            <x-slot name="footer">
                <div class="text-right">
                    <x-secondary-button x-on:click="show=false" wire:loading.attr="disabled">
                        volver
                    </x-secondary-button>


                    <x-primary-button x-show="edit" wire:click="update" class="ml-2" wire:loading.attr="disabled">
                        Editar </x-primary-button>

                    <x-primary-button x-show="!edit" class="ml-2" wire:click="save" wire:loading.attr="disabled">
                        Guardar
                    </x-primary-button>

                </div>
            </x-slot>

        </x-modal>
    </div>

    <x-modal-confirmation-delete />
</div>
