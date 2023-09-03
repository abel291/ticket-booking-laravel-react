<div>
    <div x-data="{
        show: @entangle('open').defer,
        edit: false,
    }" @open-modal-edit.window=" show = true;edit= true; $wire.edit($event.detail)">
        <x-primary-button x-on:click="show = true;edit=false;" wire:click="create">Agregar
            {{ $label }}</x-primary-button>

        <x-modal>

            <x-slot name="title">
                <div class="flex gap-x-2 items-center">
                    <h2>{{ $label_plural }}</h2>
                    <div wire:loading wire:target="ticket_type"><x-spinner-loading class="w-4 h-4" /></div>
                </div>
            </x-slot>
            <x-slot name="content">

                <x-form.grid>
                    <div class="lg:col-span-4">
                        <x-form.input-label-error wire:model.defer="ticket_type.name">
                            Nombre
                        </x-form.input-label-error>
                    </div>
                    <div class="lg:col-span-2">
                        <x-form.input-label-error type="number" min="1" wire:model.defer="ticket_type.quantity">
                            Cantidad de boletos disponible
                        </x-form.input-label-error>
                    </div>
                    <div class="lg:col-span-2">
                        <x-form.select required wire:model="ticket_type.type" label="Tipo de Ticket">
                            <option value="{{ \App\Enums\TicketTypesEnum::FREE->value }}">Gratis</option>
                            <option value="{{ \App\Enums\TicketTypesEnum::PAID->value }}">de Pago</option>
                        </x-form.select>
                    </div>
                    <div class="lg:col-span-2">
                        <x-form.select-active required wire:model.defer="ticket_type.active" />
                    </div>
                    <div class="lg:col-span-2"></div>

                    @if ($ticket_type->type == App\Enums\TicketTypesEnum::PAID)
                        <div class="lg:col-span-2">
                            <x-form.input-group text="$" type="number" min="1"
                                wire:model.debounce.500ms="ticket_type.price_basic">
                                Precio de venta
                                <div class="text-gray-400 text-xs font-normal">
                                    Total del comprador:
                                    <span wire:loading.remove>@money($ticket_type->price)</span>
                                    <span wire:loading>....</span>
                                </div>
                                </x-form.input-label-error>
                        </div>

                        <div class="lg:col-span-4 flex items-end">
                            <x-form.input-checkbox wire:model.debounce.100ms="ticket_type.includeFee"
                                label="Cubrir tarifas"
                                text="Las tarifas de venta de entradas se deducen de tus ingresos por entradas" />

                        </div>
                    @endif

                    <div class="lg:col-span-2 flex items-end">
                        <x-form.input-checkbox wire:model.defer="ticket_type.show_remaining_entries"
                            label="Mostrar boletos restante" />

                    </div>
                    <div class="lg:col-span-2 flex items-end">
                        <x-form.input-checkbox wire:model.defer="ticket_type.default" label="Precio por defecto" />
                    </div>
                    <div></div>

                    <div class="lg:col-span-2">
                        <x-form.input-label-error type="number" min="1"
                            wire:model.defer="ticket_type.min_purchase">
                            Cantidad minima de boletos a comprar
                        </x-form.input-label-error>
                    </div>

                    <div class="lg:col-span-2">
                        <x-form.input-label-error type="number" min="1"
                            wire:model.defer="ticket_type.max_purchase">
                            Cantidad maxima de boletos a comprar
                        </x-form.input-label-error>
                    </div>
                    <div></div>
                    <div class="lg:col-span-2">
                        <x-form.input-date wire:model.defer="ticket_type.sales_start_date">
                            Inicio de ventas
                        </x-form.input-date>
                    </div>

                    <div class="lg:col-span-2">
                        <x-form.input-date wire:model.defer="ticket_type.sales_end_date">
                            Fin de ventas
                        </x-form.input-date>
                    </div>


                    <div class="lg:col-span-5">
                        <x-form.input-label-error wire:model.defer="ticket_type.entry">
                            Pequeña Descripcion
                        </x-form.input-label-error>
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
