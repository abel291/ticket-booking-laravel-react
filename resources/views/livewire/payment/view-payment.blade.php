<div>
    <x-slot name="header">
        Pedido #{{ $payment->code }}
    </x-slot>
    <div>
        <div class="bg-white overflow-hidden sm:rounded p-6">
            <div class="flex justify-between items-start">
                <div class="space-y-2 mb-6 text-sm">
                    <div class="flex items-center">
                        <span class="font-semibold mr-2">Nombre:</span>
                        {{ $payment->user->name }}
                    </div>
                    <div class="flex items-center">
                        <span class="font-semibold mr-2">Telefono:</span>
                        {{ $payment->phone ? $payment->phone : $payment->user->phone }}
                    </div>

                    <div class="flex items-center">
                        <span class="font-semibold mr-2">Email:</span>
                        {{ $payment->email ? $payment->email : $payment->user->email }}
                    </div>
                    <div class="flex items-center">
                        <span class="font-semibold mr-2">
                            Fecha de pago:
                        </span>
                        {{ $payment->created_at }}
                    </div>
                    <div class="flex items-center">
                        <span class="font-semibold mr-2">
                            Estado:
                        </span>
                        <div class="text-sm">
                            <x-payment-badge-state :status="$payment->status" />
                        </div>
                    </div>
                </div>
                <div>
                    @if ($payment->status != \App\Enums\PaymentStatus::REFUNDED)
                        <x-danger-button x-data class="ml-3" x-on:click="$dispatch('open-modal-confirmation-delete')">
                            {{ $payment->status != \App\Enums\PaymentStatus::SUCCESSFUL ? 'Rembolsar' : 'Cancelar' }} pago
                        </x-danger-button>
                    @endif
                </div>
            </div>
            <div>
                <table class="w-full rounded-lg overflow-hidden table-fixed text-sm">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 bg-gray-100 text-heading font-semibold text-left">
                                Tickets
                            </th>
                            <th class="px-4 py-2 bg-gray-100 text-heading font-semibold text-left">
                                Fechas
                            </th>
                            <th class="px-4 py-2 bg-gray-100 text-heading font-semibold text-left">
                                Monto
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($payment->tickets as $ticket)
                            <tr>
                                <td class="px-4 py-2 text-left">
                                    {{ $ticket->quantity }} x {{ $ticket->ticket_type->name }}
                                </td>
                                <td class="px-4 py-2 text-left">
                                    {{ $ticket->session }}
                                </td>
                                <td class="px-4 py-2 text-left">
                                    <x-money amount="{{ $ticket->total }}" currency="USD" convert />
                                </td>
                            </tr>
                        @endforeach

                        <tr class="font-semibold italic bg-gray-100">
                            <td class="px-4 py-2 text-left " colspan="2">Subtotal</td>
                            <td class="px-4 py-2 text-left">
                                <x-money amount="{{ $payment->sub_total }}" currency="USD" convert />
                            </td>
                        </tr>

                        @if ($payment->promotion_data)
                            <tr class="font-semibold italic text-green-600">
                                <td class="px-4 py-2 text-left" colspan="2">Descuento</td>
                                <td class="px-4 py-2 text-left">
                                    -
                                    <x-money amount="{{ $payment->promotion_data->applied }}" currency="USD"
                                        convert />
                                </td>
                            </tr>
                        @endif

                        {{-- <tr class="font-semibold italic">
                            <td class="px-4 py-2 text-left ">
                                Impuestos ({{ $payment->tax_percent }}%)
                            </td>
                            <td class="px-4 py-2 text-left">
                                <x-money amount="{{ $payment->tax_amount }}" currency="USD" convert />
                            </td>
                        </tr>
                        <tr class="font-semibold italic">
                            <td class="px-4 py-2 text-left ">Envio</td>
                            <td class="px-4 py-2 text-left">
                                <x-money amount="{{ $payment->shipping }}" currency="USD" convert />
                            </td>
                        </tr> --}}
                        <tr class="font-bold  text-lg bg-gray-100">
                            <td class="px-4 py-2 text-left " colspan="2">Total</td>
                            <td class="px-4 py-2 text-left">
                                <x-money amount="{{ $payment->total }}" currency="USD" convert />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-6 text-right">

                <a href="{{route('dashboard.payments')}}">
                    <x-secondary-button >
                        volver
                    </x-secondary-button>
                </a>
            </div>

        </div>

        <!--Modal confirmation delete-->
        <div>
            <div x-data="{
                show: @entangle('open_modal_confirmation').defer,                
            }" @open-modal-confirmation-delete.window="show = true">

                <x-modal>
                    <x-slot name="title">
                        Cancelar Pago
                    </x-slot>

                    <x-slot name="content">
                        <p class="mb-2">
                            ¿Estás seguro de que deseas Cancelar este PAGO?
                        </p>
                        <div class="flex items-center">
                            <input type="checkbox" id="refund" class="mr-3 text-red-500 focus:ring-red-500 rounded"
                                wire:model.defer="refund_checkbox">
                            <label for="refund">
                                Rembolsar dinero
                                <span class="text-green-600 font-medium">
                                    <x-money amount="{{ $payment->total }}" currency="USD" convert />
                                </span>
                            </label>
                        </div>
                    </x-slot>

                    <x-slot name="footer">
                        <x-secondary-button x-on:click="show=false" wire:loading.attr="disabled">
                            cancelar
                        </x-secondary-button>

                        <x-danger-button class="ml-2" x-on:click="$wire.delete({{$payment->id}})"
                            wire:loading.attr="disabled">
                            <span wire:loading.class="hidden" wire:target="delete">Cancelar Pago</span>
                            <span wire:loading wire:target="delete"> Cancelando... </span>
                        </x-danger-button>
                    </x-slot>
                </x-modal>
            </div>
        </div>
    </div>
</div>
