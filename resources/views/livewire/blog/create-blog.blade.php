<div>
    <div x-data="{
        show: @entangle('open').defer,
        edit: false,
        tab: 'form'
    }" @open-modal-edit.window=" show = true;edit= true; tab='form'; $wire.edit($event.detail)">
        <x-primary-button x-on:click="show = true;edit=false; tab='form'; $dispatch('reset-input-image')"
            wire:click="create">
            Agregar
            {{ $label }}</x-primary-button>

        <x-modal>

            <x-slot name="title">
                <h2>{{ $label_plural }}</h2>
            </x-slot>
            <x-slot name="content">
                <div>
                    @if ($errors->any())
                        <p class="error text-sm font-medium text-red-600 mb-2">Hay errores por revisar</p>
                    @endif
                </div>

                <div>
                    <div class="flex items-center gap-2 py-6 ">

                        <button class="py-2 px-3 rounded-md font-medium"
                            x-bind:class="tab == 'form' ? 'bg-gray-200 text-gray-800' : 'text-gray-500'"
                            x-on:click="tab='form' ">Datos</button>

                        <button class="py-2 px-4 rounded-md font-medium"
                            x-bind:class="tab == 'categories' ? 'bg-gray-200 text-gray-800' : 'text-gray-500'"
                            x-on:click="tab='categories' ">Categorias</button>

                        <button class="py-2 px-4 rounded-md font-medium"
                            x-bind:class="tab == 'images' ? 'bg-gray-200 text-gray-800' : 'text-gray-500'"
                            x-on:click="tab='images' ">Imagenes</button>

                    </div>
                </div>
                <div x-show="tab=='form'" x-transition>
                    <x-blog.form />
                </div>
                <div x-show="tab=='categories'" x-transition>
                    <x-blog.categories />
                </div>
                <div x-show="tab=='images'" x-transition>
                    @if ($blog)
                        <x-form.image :image="$blog->getFirstMediaUrl('image')" wire:model="image" />
                    @endif
                    <x-form.input-error for="image" />
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

    <!--Modal confirmation delete-->
    <x-modal-confirmation-delete />

</div>
