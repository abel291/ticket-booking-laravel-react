<div>
    <x-slot name="header">
        Crear Evento
    </x-slot>

    <div class=" p-8 bg-white shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <div 
            x-data="{
                tab: 'form'
            }">
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

                    <button class="py-2 px-4 rounded-md font-medium"
                        x-bind:class="tab=='categories' ? 'bg-gray-200 text-gray-800':'text-gray-500' "
                        x-on:click="tab='categories' ">Tickets</button>

                    <button class="py-2 px-4 rounded-md font-medium"
                        x-bind:class="tab=='dates' ? 'bg-gray-200 text-gray-800':'text-gray-500' "
                        x-on:click="tab='dates' ">Fechas</button>

                </div>
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

            <div x-show="tab=='tickets'" x-transition.opacity>

            </div>
            <div x-show="tab=='dates'" x-transition.opacity>

            </div>
        </div>

        <div class="text-right">
            <x-secondary-button x-on:click="show=false" wire:loading.attr="disabled">
                volver
            </x-secondary-button>
            @if ($is_edit)
                <x-button wire:click="update" class="ml-2" wire:loading.attr="disabled">
                    Editar </x-button>
            @else
                <x-button class="ml-2" wire:click="save" wire:loading.attr="disabled">
                    Guardar
                </x-button>
            @endif




        </div>
    </div>
</div>

{{-- modificar el form para los input y las grillas  --}}
