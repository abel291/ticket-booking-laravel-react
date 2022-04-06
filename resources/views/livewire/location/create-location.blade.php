<div>
    <div x-data="{
        show: @entangle('open').defer,
        edit: false,
    }" @open-modal-edit.window=" show = true;edit= true; $wire.edit($event.detail)">
        <x-button x-on:click="show = true;edit=false;" wire:click="create">Agregar {{ $label }}</x-button>

        <x-modal>

            <x-slot name="title">
                <h2>{{ $label_plural }}</h2>
            </x-slot>
            <x-slot name="content">

                <div class="grid grid-cols-3 gap-4 mb-6">
                    <div>
                        <x-form.label class="block">Nombre</x-form.label>
                        <div>
                            <x-form.input required type="text" class="w-full" wire:model.defer="location.name" />
                            <x-form.input-error for="location.name" />
                        </div>
                    </div>
                    <div>
                        <x-form.label class="block">Telefono</x-form.label>
                        <div>
                            <x-form.input required type="text" class="w-full"
                                wire:model.defer="location.phone" />
                            <x-form.input-error for="location.phone" />
                        </div>
                    </div>
                    <div>
                        <x-form.label class="block">Activo</x-form.label>
                        <div class="mt-2">
                            <x-form.active required wire:model.defer="location.active" />
                            <x-form.input-error for="location.active" />
                        </div>
                    </div>

                    <div class="col-span-3">
                        <x-form.label class="block">Direccion</x-form.label>
                        <div>
                            <x-form.input required type="text" class="w-full"
                                wire:model.defer="location.address" />
                            <x-form.input-error for="location.address" />
                        </div>
                    </div>



                </div>
            </x-slot>

            <x-slot name="footer">
                <div class="text-right">
                    <x-secondary-button x-on:click="show=false" wire:loading.attr="disabled">
                        volver
                    </x-secondary-button>


                    <x-button x-show="edit" wire:click="update" class="ml-2" wire:loading.attr="disabled">
                        Editar </x-button>

                    <x-button x-show="!edit" class="ml-2" wire:click="save" wire:loading.attr="disabled">
                        Guardar
                    </x-button>

                </div>
            </x-slot>

        </x-modal>
    </div>

    <!--Modal confirmation delete-->
    <x-modal-confirmation-delete />
</div>
