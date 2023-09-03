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

                <x-form.grid>
                    <div class="lg:col-span-3">
                        <x-form.input-label-error wire:model.defer="location.name">
                            Nombre
                        </x-form.input-label-error>
                    </div>
                    <div class="lg:col-span-3">
                        <x-form.input-label-error wire:model.defer="location.phone">
                            Telefono
                        </x-form.input-label-error>
                    </div>
                    <div class="lg:col-span-2">
                        <x-form.select-active required wire:model.defer="location.active" />
                    </div>

                    <div class="lg:col-span-5">
                        <x-form.textarea wire:model.defer="location.address">
                            Direccion
                        </x-form.textarea>
                    </div>
                    <div class="lg:col-span-5">
                        <x-form.textarea required wire:model.defer="location.map">Iframe Mapa</x-form.textarea>
                    </div>
                </x-form.grid>


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
