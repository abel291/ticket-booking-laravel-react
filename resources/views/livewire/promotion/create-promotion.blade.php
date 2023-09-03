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

                <div class="grid grid-cols-3 gap-4 mb-6">
                    <div>
                        <x-form.label class="block">Codigo</x-form.label>
                        <div>
                            <x-form.input required type="text" class="w-full" wire:model.defer="promotion.code"
                                max="10" />
                            <x-form.input-error for="promotion.code" />
                        </div>
                    </div>

                    <div>
                        <x-form.label class="block">Valor</x-form.label>
                        <div>
                            <x-form.input required type="number" class="w-full" wire:model.defer="promotion.value" />
                            <x-form.input-error for="promotion.value" />
                        </div>
                    </div>

                    <div>
                        <x-form.label class="block">Tipo de valor</x-form.label>
                        <div>
                            <x-form.select required type="number" class="w-full" wire:model.defer="promotion.type">
                                <option selected>Selecione un tipo de valor </option>
                                <option value={{ \App\Enums\PromotionType::PERCENT->value }}>Porcentaje (%)</option>
                                <option value={{ \App\Enums\PromotionType::AMOUNT->value }}>Monto ($)</option>
                            </x-form.select>
                            <x-form.input-error for="promotion.type" />
                        </div>
                    </div>

                    <div>
                        <x-form.label class="block">Cantidad Disponible</x-form.label>
                        <div>
                            <x-form.input required type="number" class="w-full"
                                wire:model.defer="promotion.quantity" />
                            <x-form.input-error for="promotion.quantity" />
                        </div>
                    </div>

                    <div>
                        <x-form.label class="block">Fecha de expiracion</x-form.label>
                        <div>
                            <div x-data x-init="flatpickr($refs.expired, {
                                enableTime: true,
                                enableSeconds: false,
                                time_24hr: false,
                                altInput: true,
                                altFormat: 'Y-m-d h:i K',
                                dateFormat: 'Y-m-d H:i:S',
                                //minDate: 'today',
                                defaultDate: '{{ $promotion->expired }}'
                            })">
                                <x-form.input type="text" x-ref="expired" required class="w-full"
                                    wire:model.defer="promotion.expired" />

                            </div>
                            <x-form.input-error for="promotion.expired" />
                        </div>
                    </div>

                    <div>
                        <x-form.label class="block">Activo</x-form.label>
                        <div class="mt-2">
                            <x-form.active required wire:model.defer="promotion.active" />
                            <x-form.input-error for="promotion.active" />
                        </div>
                    </div>


                    <div class="col-span-3">
                        <x-form.label class="block">Descripcion</x-form.label>
                        <div>
                            <x-form.input required type="text" class="w-full"
                                wire:model.defer="promotion.description" />
                            <x-form.input-error for="promotion.description" />
                        </div>
                    </div>




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
