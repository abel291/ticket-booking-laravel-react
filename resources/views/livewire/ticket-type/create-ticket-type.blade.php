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

                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <x-form.label class="block">Nombre</x-form.label>
                        <div>
                            <x-form.input required type="text" class="w-full"
                                wire:model.defer="ticket_type.name" />
                            <x-form.input-error for="ticket_type.name" />
                        </div>
                    </div>
                    <div>
                        <x-form.label class="block">Cantidad de boletos disponible</x-form.label>
                        <div>
                            <x-form.input required type="number" min="1" class="w-full"
                                wire:model.defer="ticket_type.quantity" />
                            <x-form.input-error for="ticket_type.quantity" />
                        </div>
                    </div>
                    <div>
                        <x-form.label class="block">Precio</x-form.label>
                        <div>
                            <x-form.input required type="number" min="1" class="w-full"
                                wire:model.defer="ticket_type.price" />
                            <x-form.input-error for="ticket_type.price" />
                        </div>
                    </div>
                    <div>
                        <x-form.label class="block">Precio por defecto</x-form.label>
                        <div class="mt-2">
                            <x-form.active required wire:model.defer="ticket_type.default" />
                            <x-form.input-error for="ticket_type.default" />
                        </div>
                    </div>
                    <div>
                        
                        <x-form.label class="block">Tipo de Ticket</x-form.label>
                        <div>
                            <x-form.select required type="number" class="w-full"
                                wire:model.defer="ticket_type.type">
                                <option>Selecione un tipo de Boleto </option>
                                <option value="{{ \App\Enums\TicketTypes::FREE->value }}">Gratis</option>
                                <option value="{{ \App\Enums\TicketTypes::PAID->value }}">de Pago</option>
                            </x-form.select>
                            <x-form.input-error for="ticket_type.type" />
                        </div>
                    </div>
                    
                    <div class="col-span-2">
                        <x-form.label class="block">Pequeña Descripcion</x-form.label>
                        <div class="mt-2">
                            <x-form.input required type="text" min="1" class="w-full"
                                wire:model.defer="ticket_type.desc" />
                            <x-form.input-error for="ticket_type.desc" />
                        </div>
                    </div>

                    <div>
                        <x-form.label class="block">Cantidad minima de boletos a comprar</x-form.label>
                        <div>
                            <x-form.input required type="number" min="1" class="w-full"
                                wire:model.defer="ticket_type.min_tickets_purchase" />
                            <x-form.input-error for="ticket_type.min_tickets_purchase" />
                        </div>
                    </div>

                    <div>
                        <x-form.label class="block">Cantidad maxima de boletos a comprar</x-form.label>
                        <div>
                            <x-form.input required type="number" min="1" class="w-full"
                                wire:model.defer="ticket_type.max_tickets_purchase" />
                            <x-form.input-error for="ticket_type.max_tickets_purchase" />
                        </div>
                    </div>

                    <div>
                        <x-form.label class="block">Mostrar boletos restante</x-form.label>
                        <div class="mt-2">
                            <x-form.active required wire:model.defer="ticket_type.show_remaining_entries" />
                            <x-form.input-error for="ticket_type.show_remaining_entries" />
                        </div>
                    </div>

                    <div>
                        <x-form.label class="block">Activo</x-form.label>
                        <div class="mt-2">
                            <x-form.active required wire:model.defer="ticket_type.active" />
                            <x-form.input-error for="ticket_type.active" />
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
