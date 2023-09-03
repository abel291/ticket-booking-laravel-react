import FormGrid from '@/Components/Form/FormGrid';

import SelectActive from '@/Components/Form/SelectActive';
import ManagerLayout from '@/Layouts/ManagerLayout';
import { Link, router, useForm } from '@inertiajs/react';
import React, { useEffect, useState } from 'react'

import InputDateLabelError from '@/Components/Form/InputDateLabelError';
import Label from '@/Components/Label';
import Button from '@/Components/Button';
import TableTitleImage from '@/Components/Table/TableTitleImage';
import Badge from '@/Components/Badge';
import { formatCurrency } from '@/Helpers/Helpers';
import Checkbox from '@/Components/Checkbox';

const SessionCreate = ({ eventId, session, edit, ticketTypes, ticket_type_selected = [] }) => {
    const { setData, data, post, put, processing, errors } = useForm({
        date: session.date,
        active: session.active,
        ticket_type_selected: ticket_type_selected
    });
    const handleSubmit = (e) => {
        e.preventDefault()
        if (edit) {
            put(route('manager.events.sessions.update', [eventId, session.id]))
        } else {
            post(route('manager.events.sessions.store', eventId))
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
        console.log(data.date);
        setData(name, date);
    }

    const handleChangeTicketType = (e) => {
        let new_ticket_type_selected = [...data.ticket_type_selected]
        let id = parseInt(e.target.value);
        if (e.target.checked) {
            new_ticket_type_selected = [...new_ticket_type_selected, id];
        } else {
            new_ticket_type_selected = new_ticket_type_selected.filter((item) => item != id)
        }

        setData(e.target.name, new_ticket_type_selected);
    }

    return (
        <ManagerLayout title="Sesiones">
            <div className="max-w-3xl ">
                <form onSubmit={handleSubmit}>
                    <div className="space-y-12">
                        <div className='border-b border-gray-900/10 pb-12'>
                            <FormGrid className="mt-8">
                                <div className="sm:col-span-2">
                                    <Label>Session</Label>
                                    <InputDateLabelError handleChangeDate={handleChangeDate} errors={errors.date} name="date"
                                        value={data.date} />
                                </div>

                                <div className="sm:col-span-2">
                                    <SelectActive handleChange={handleChange} errors={errors.active} value={data.active} name="active" />
                                </div>

                            </FormGrid>
                        </div>
                        <div>
                            <div className="border-b border-gray-900/10 pb-8">
                                <h2 className="text-base font-semibold leading-7 text-gray-900">Tipos de Ticket</h2>
                                <div className="mt-6">
                                    <table className="w-full table-list table-auto bg-white ">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th> Nombre</th>
                                                <th> Cantidad</th>
                                                <th> Tipo de Ticket</th>
                                                <th> Precio</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {ticketTypes.map((ticketType) => (
                                                <tr>
                                                    <td>
                                                        <Checkbox
                                                            name="ticket_type_selected"
                                                            value={ticketType.id}
                                                            checked={data.ticket_type_selected.includes(ticketType.id)}
                                                            onChange={handleChangeTicketType}
                                                        />
                                                    </td>
                                                    <td>
                                                        <TableTitleImage title={ticketType.name} />
                                                    </td>
                                                    <td>{ticketType.quantity}</td>
                                                    <td>
                                                        <Badge color={ticketType.typeColor}>{ticketType.type}</Badge>

                                                    </td>
                                                    <td>
                                                        {formatCurrency(ticketType.price)}
                                                    </td>
                                                </tr>
                                            ))}
                                        </tbody>
                                    </table>
                                </div>
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

export default SessionCreate
