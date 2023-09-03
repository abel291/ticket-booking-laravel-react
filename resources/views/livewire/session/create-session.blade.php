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

                    <div class="lg:col-span-2">
                        <x-form.input-date :date="$session->date" required class="w-full" wire:model.defer="session.date">
                            Fecha
                        </x-form.input-date>
                    </div>

                    <div class="lg:col-span-2">
                        <x-form.select-active required wire:model.defer="session.active" />
                    </div>

                    <div class="lg:col-span-4">
                        <x-form.title>Tickets disponibles</x-form.title>
                        <div class=" space-y-3">
                            @foreach ($ticket_types as $ticket_type)
                                <div class="px-2 py-3 rounded-md bg-gray-100">
                                    <x-form.input-checkbox value="{{ $ticket_type->id }}" :label="$ticket_type->name"
                                        wire:model.defer='tickets_type_selected'>
                                        <x-slot:text>
                                            <div class="text-sm mt-1.5">
                                                <div>
                                                    Precio: @money($ticket_type->price)
                                                </div>
                                                <div class="mt-1">
                                                    Cantidad disponible: {{ $ticket_type->quantity }}
                                                </div>
                                            </div>
                                        </x-slot:text>

                                    </x-form.input-checkbox>

                                </div>
                            @endforeach
                        </div>
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

    <!--Modal confirmation delete-->
    <x-modal-confirmation-delete />
</div>
