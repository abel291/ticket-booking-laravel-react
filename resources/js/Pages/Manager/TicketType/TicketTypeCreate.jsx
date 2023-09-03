import FormGrid from '@/Components/Form/FormGrid';
import InputCheckBoxLabelError from '@/Components/Form/InputCheckBoxLabelError';
import InputLabelError from '@/Components/Form/InputLabelError';
import SelectActive from '@/Components/Form/SelectActive';
import ManagerLayout from '@/Layouts/ManagerLayout';
import { Link, router, useForm } from '@inertiajs/react';
import React, { useEffect, useState } from 'react'
import TicketTypeFormPrice from './TicketTypeFormPrice';

import InputDateLabelError from '@/Components/Form/InputDateLabelError';
import Label from '@/Components/Label';
import Button from '@/Components/Button';

const TicketTypeCreate = ({ eventId, ticketType, edit, price }) => {
    const { setData, data, post, put, processing, errors } = useForm(ticketType);

    const handleSubmit = (e) => {
        e.preventDefault()
        if (edit) {
            put(route('manager.events.ticket_types.update', [eventId, ticketType.id]))
        } else {
            post(route('manager.events.ticket_types.store', eventId))
        }
    }

    const handleChange = (e) => {
        setData(
            e.target.name,
            e.target.type === "checkbox"
                ? e.target.checked ? 1 : 0
                : e.target.value
        );
    }

    const handleChangeDate = (name, date) => {
        setData(name, date);
    }

    return (
        <ManagerLayout title="Tipo de Boleto">
            <div className="max-w-3xl ">
                <form onSubmit={handleSubmit}>
                    <div className="space-y-12">
                        <div className='border-b border-gray-900/10 pb-12'>
                            <FormGrid className="mt-8">
                                <div className="sm:col-span-4">
                                    <InputLabelError handleChange={handleChange} errors={errors.name} label="Nombre" placeholder="Entrada General" name="name" value={data.name} />
                                </div>

                                <div className="sm:col-span-2">
                                    <SelectActive handleChange={handleChange} errors={errors.active} value={data.active} name="active" />
                                </div>

                                <div className="sm:col-span-2">
                                    <InputLabelError handleChange={handleChange} errors={errors.quantity} label="Cantidad de boletos" name="quantity" value={data.quantity} type="number" min="0" />
                                </div>

                                <div className="sm:col-span-2">
                                    <InputLabelError handleChange={handleChange} errors={errors.min_purchase} label="Cantidad minima a comprar" name="min_purchase" value={data.min_purchase} type="number" min="0" />
                                </div>
                                <div className="sm:col-span-2">
                                    <InputLabelError handleChange={handleChange} errors={errors.max_purchase} label="Cantidad maxima a comprar" name="max_purchase" value={data.max_purchase} type="number" min="0" />
                                </div>

                                <div className="sm:col-span-6">
                                    <InputLabelError handleChange={handleChange} errors={errors.entry} label="Pequeña Descripcion" name="entry"
                                        value={data.entry} />
                                </div>

                                <div className="sm:col-span-2 flex items-end">
                                    <InputCheckBoxLabelError
                                        handleChange={handleChange}
                                        errors={errors.show_remaining_entries}
                                        label="Mostrar boletos restante"
                                        name="show_remaining_entries"
                                        value={data.show_remaining_entries} />
                                </div>
                                <div className="sm:col-span-2">
                                    <InputCheckBoxLabelError
                                        handleChange={handleChange}
                                        errors={errors.default}
                                        label="Precio por defecto"
                                        name="default"
                                        value={data.default} />
                                </div>


                            </FormGrid>
                        </div>
                        <div>
                            <div className="border-b border-gray-900/10 pb-8">
                                <h2 className="text-base font-semibold leading-7 text-gray-900">Precios y tarifas</h2>
                                <div className="mt-6">
                                    <TicketTypeFormPrice handleChange={handleChange} data={data} setData={setData} errors={errors} />
                                </div>
                            </div>
                        </div>
                        <div>
                            <div className="border-b border-gray-900/10 pb-12">
                                <h2 className="text-base font-semibold leading-7 text-gray-900">Fechas</h2>
                                <FormGrid className="mt-6">
                                    <div className="sm:col-span-2">
                                        <Label>Inicio de ventas</Label>
                                        <InputDateLabelError handleChangeDate={handleChangeDate} errors={errors.sales_start_date} name="sales_start_date"
                                            value={data.sales_start_date} />
                                    </div>
                                    <div className="sm:col-span-2">
                                        <Label>Final de ventas</Label>
                                        <InputDateLabelError handleChangeDate={handleChangeDate} errors={errors.sales_end_date} name="sales_end_date"
                                            value={data.sales_end_date} />
                                    </div>
                                </FormGrid>
                            </div>
                        </div>
                    </div>
                    <div className="mt-6 flex items-center justify-end gap-x-3">
                        <Link className="btn btn-secondary" href={route('manager.events.index')}>
                            Cancelar
                        </Link>
                        <Button processing={processing}>
                            Guardar
                        </Button>
                    </div>

                </form>
            </div>
        </ManagerLayout>
    )
}

export default TicketTypeCreate
