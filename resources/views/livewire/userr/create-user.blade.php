<div>
    <div x-data="{
        show : @entangle('open').defer ,
        edit : @entangle('edit').defer ,
        }" @open-modal-edit.window="show = true ; id=$event.detail; $wire.edit($event.detail)">
        <x-jet-button x-on:click="show = true" wire:click="create">Agregar {{ $label }}</x-jet-button>
        <x-modal>

            <x-slot name="title">
                <h2>{{ $label }}</h2>
            </x-slot>
            <x-slot name="content">
                <div class="divide-y divide-gray-100">
                    <div class="flex items-center py-4 ">
                        <x-form-label class="w-3/12">
                            Nombre

                        </x-form-label>
                        <div class=" w-4/12">
                            <x-form-input type="text" wire:model.defer="category.name">
                            </x-form-input>
                            @error('category.name')
                                <span class="error error-input">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex items-center py-4 ">
                        <x-form-label class="w-3/12">
                            Slug

                        </x-form-label>
                        <div class=" w-4/12">
                            <x-form-input type="text" wire:model.defer="category.slug">
                            </x-form-input>
                            @error('category.slug')
                                <span class="error error-input">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex items-center py-4 ">
                        <x-form-label class="w-3/12">
                            Activo

                        </x-form-label>
                        <div class=" w-4/12">
                            <div class="flex items-center">
                                <div>
                                    <span>SI</span>
                                    <x-form-input type="radio" name="active" value="1"
                                        wire:model.defer="category.active">
                                    </x-form-input>
                                </div>
                                <div class="ml-3">
                                    <span>NO</span>
                                    <x-form-input type="radio" name="active" value="0"
                                        wire:model.defer="category.active">
                                    </x-form-input>
                                </div>
                            </div>
                            @error('category.active')
                                <span class="error error-input">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex items-center py-4 ">
                        <x-form-label class="w-3/12">Image</x-form-label>

                        <div class="w-8/12">
                            <x-form-input-file :temp="$img" :multiple="false" name="img" :saved="$category->img" />
                            @error('img')
                                <span class="error error-input">{{ $message }}</span>
                            @enderror


                        </div>
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button x-on:click="show = false" wire:loading.attr="disabled">
                    volver
                </x-secondary-button>
                <x-button x-show="!edit" class="ml-2" wire:click="save" wire:loading.attr="disabled">
                    Guardar
                </x-button>
                <x-button x-show="edit" x-on:click="$wire.update(id)" class="ml-2"
                    wire:loading.attr="disabled">
                    Editar </x-button>
            </x-slot>
        </x-modal>


        {{-- <!--Modal confirmation delete-->
    <div>
        <div x-data="{
        show :@entangle('open_modal_confirmation').defer,
        id:null
    }" @open-modal-confirmation-delete.window="show = true;id=$event.detail;">

            <x-confirmation-modal>
                <x-slot name="title">
                    Borrar Categoria
                </x-slot>

                <x-slot name="content">
                    ¿Estás seguro de que deseas eliminar esta categoria?
                </x-slot>

                <x-slot name="footer">
                    <x-secondary-button x-on:click="show=false" wire:loading.attr="disabled">
                        cancelar
                    </x-secondary-button>

                    <x-danger-button class="ml-2" x-on:click="$wire.delete(id)"
                        wire:loading.attr="disabled">
                        <span wire:loading.class="hidden" wire:target="delete">Borrar Categoria</span>
                        <span wire:loading wire:target="delete"> Borrando... </span>
                    </x-danger-button>
                </x-slot>
            </x-confirmation-modal>
        </div>
    </div>
</div> --}}
