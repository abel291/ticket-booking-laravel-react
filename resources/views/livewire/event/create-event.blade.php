<div>
    <div x-data="{
        show: @entangle('open').defer,
        edit: false,
    }" @open-modal-edit.window="show = true; edit= true; $wire.edit($event.detail); $dispatch('reset-input-image')">
        <x-button x-on:click="show = true;edit=false;" wire:click="create">Agregar {{ $label }}</x-button>

        <x-modal>

            <x-slot name="title">
                <h2>{{ $label_plural }}</h2>
            </x-slot>
            <x-slot name="content">
                <div x-data="{ tab: 'form' }">
                    <div>
                        @if ($errors->any())
                            <p class="error text-sm font-medium text-red-600 mb-2">Hay errores por revisar</p>
                        @endif
                    </div>
                    <div>
                        <div class="flex items-center gap-2 py-6 ">
                            <button class="py-2 px-3 rounded-md font-medium"
                                x-bind:class="tab=='form' ? 'bg-gray-200 text-gray-800':'text-gray-500' "
                                x-on:click="tab='form' ">Datos</button>

                            <button class="py-2 px-4 rounded-md font-medium"
                                x-bind:class="tab=='images' ? 'bg-gray-200 text-gray-800':'text-gray-500' "
                                x-on:click="tab='images' ">Imagenes</button>
                        </div>

                        <div x-show="tab=='form'" x-transition.opacity>
                            <x-event.form />
                        </div>
                        <div x-show="tab=='images'" x-transition.opacity>
                            <div class="grid grid-cols-1 gap-6">

                                <div wire.key="banner">
                                    <span class="block font-medium text-sm text-gray-700">Banner</span>
                                    
                                    <x-form.image :image="$event->getFirstMediaUrl('banner')" wire:model="banner" />
                                    <x-form.input-error for="banner" />
                                </div>
                                <div wire.key="card">
                                    <span class="block font-medium text-sm text-gray-700">Card</span>
                                    
                                    <x-form.image :image="$event->getFirstMediaUrl('card')" wire:model="card" />
                                    <x-form.input-error for="card" />
                                </div>


                            </div>
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
