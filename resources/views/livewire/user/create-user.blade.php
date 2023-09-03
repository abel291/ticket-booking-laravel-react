<div>
    <div x-data="{
        show: @entangle('open').defer,
        edit: @entangle('edit_var').defer,
    }" @open-modal-edit.window="show = true ; id=$event.detail; $wire.edit($event.detail)">
        <x-primary-button x-on:click="show = true" wire:click="create">Agregar {{ $label }}</x-primary-button>

        <x-modal>
            <x-slot name="title">
                <h2>{{ $label_plural }}</h2>
            </x-slot>
            <x-slot name="content">
                <div class="flex flex-col gap-4">

                    <div class="flex items-center ">
                        <x-form.label class="block w-2/12 mt-1">Nombre</x-form.label>
                        <div class="w-4/12">
                            <x-form.input required type="text" class="w-full" wire:model.defer="user.name" />
                            <x-form.input-error for="user.name" />
                        </div>
                    </div>

                    <div class="flex items-center ">
                        <x-form.label class="block w-2/12 mt-1">Email</x-form.label>
                        <div class="w-4/12">
                            <x-form.input required class="w-full" type="email" wire:model.defer="user.email" />
                            <x-form.input-error for="user.email" />
                        </div>
                    </div>

                    <div class="flex items-center ">
                        <x-form.label class="block w-2/12 mt-1">Telefono</x-form.label>
                        <div class="w-4/12">
                            <x-form.input required class="w-full" type="text" wire:model.defer="user.phone" />
                            <x-form.input-error for="user.phone" />
                        </div>
                    </div>
                    <div class="flex items-center ">
                        <x-form.label class="block w-2/12 mt-1">Activo</x-form.label>
                        <div class="w-4/12">
                            <x-form.active required wire:model.defer="user.active" />
                            <x-form.input-error for="user.active" />
                        </div>
                    </div>
                    <div class="flex items-center ">
                        <x-form.label class="block w-2/12 mt-1">Contraseña</x-form.label>
                        <div class="w-4/12">
                            <x-form.input required class="w-full" type="text" wire:model.defer="user.password" />
                            <x-form.input-error for="user.password" />
                            <span class="text-gray-300 text-xs"> Dejar el blanco si no deseas cambiarlo</span>
                        </div>
                    </div>
                    <div class="flex items-center ">
                        <x-form.label class="block w-2/12 mt-1">Confirmar contraseña</x-form.label>
                        <div class="w-4/12">
                            <x-form.input required class="w-full" type="text"
                                wire:model.defer="user.password_confirmation" />

                            <span class="text-gray-300 text-xs"> Dejar el blanco si no deseas cambiarlo</span>
                        </div>
                    </div>


                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button x-on:click="show = false" wire:loading.attr="disabled">
                    volver
                </x-secondary-button>
                <x-primary-button x-show="!edit" class="ml-2" wire:click="save" wire:loading.attr="disabled">
                    Guardar
                </x-primary-button>
                <x-primary-button x-show="edit" x-on:click="$wire.update(id)" class="ml-2"
                    wire:loading.attr="disabled">
                    Editar </x-primary-button>
            </x-slot>
        </x-modal>
    </div>

    <!--Modal confirmation delete-->
    <x-modal-confirmation-delete />
</div>
