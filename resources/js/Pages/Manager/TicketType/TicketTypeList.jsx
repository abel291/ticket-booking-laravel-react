
import ActiveBadge from '@/Components/ActiveBadge';
import Button from '@/Components/Button';


import Input from '@/Components/Input';
import { formatCurrency, formatDate } from '@/Helpers/Helpers';

import { CalendarDaysIcon, ExclamationCircleIcon, TicketIcon, ChevronDownIcon } from '@heroicons/react/24/outline';
import { Link, useForm, usePage } from '@inertiajs/react';
import React from 'react'

import ManagerLayout from '@/Layouts/ManagerLayout';
import TableTitleImage from '@/Components/Table/TableTitleImage';

import Modal from '@/Components/Modal';

import { useState } from 'react';
import ModalConfirmationDelete from '../ModalConfirmationDelete';
import Dropdown from '../Dropdown';
import CardEvent from '../CardEvent';
import Badge from '@/Components/Badge';


const TicketTypeList = ({ event, ticketTypes, filters }) => {

    const [modalOpenConfirmation, setModalOpenConfirmation] = useState(false)
    const [pathDelete, setPathDelete] = useState(false)

    const onShowConfirmModal = (id) => {

        setModalOpenConfirmation(true)

        setPathDelete(route('manager.events.ticket_types.destroy', [event.id, id]))

        console.log(route('manager.events.ticket_types.destroy', [event.id, id]))
    }
    return (
        <ManagerLayout title="Tipos de boleto">
            <div>
                <div className="flex items-end justify-between mb-4">
                    <CardEvent title={event.title} img={event.thum} category={event.category.name} subCategory={event.subCategory.name} />
                    <div>
                        <Link href={route('manager.events.ticket_types.create', event.id)} className='btn btn-primary ml-2' >Crear nuevo tipo de boleto</Link>
                    </div>
                </div>
                <div className="p-4 border rounded-md mt-6">
                    <table className="w-full table-list table-auto bg-white ">
                        <thead>
                            <tr>
                                <th> Nombre</th>
                                <th> Cantidad</th>
                                <th> Tipo de Ticket</th>
                                <th> Precio</th>
                                <th> Activo</th>
                                <th> Ultima actualización</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            {ticketTypes.data.map((ticketType, index) => (
                                <tr key={index}>
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
                                    <td><ActiveBadge active={ticketType.active} /></td>
                                    <td className='whitespace-nowrap font-medium lowercase text-gray-600 '>{ticketType.updated_at}</td>
                                    <td className="text-right font-medium whitespace-nowrap">

                                        <div className="flex items-center">
                                            <Link href={route('manager.events.ticket_types.edit', [event.id, ticketType.id])} className='font-medium text-indigo-600 hover:text-indigo-900'>
                                                Editar
                                            </Link>

                                            <button type="button" onClick={() => onShowConfirmModal(ticketType.id)} className="font-medium text-red-500 hover:text-red-700 ml-3 "
                                            >Eliminar
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                            ))}

                        </tbody>
                    </table>
                </div>

            </div>

            <div className="text-sm mt-10">

            </div>
            <ModalConfirmationDelete modalOpen={modalOpenConfirmation} setModalOpen={setModalOpenConfirmation} pathDelete={pathDelete} />
        </ManagerLayout >
    );
};

export default TicketTypeList
