
import ActiveBadge from '@/Components/ActiveBadge';

import { Link, useForm, usePage } from '@inertiajs/react';
import React from 'react'

import ManagerLayout from '@/Layouts/ManagerLayout';
import TableTitleImage from '@/Components/Table/TableTitleImage';
import { useState } from 'react';
import ModalConfirmationDelete from '../ModalConfirmationDelete';

import CardEvent from '../CardEvent';
import { formatCurrency, formatDate } from '@/Helpers/Helpers';
import Badge from '@/Components/Badge';

const SessionList = ({ event, sessions }) => {

    const [modalOpenConfirmation, setModalOpenConfirmation] = useState(false)
    const [pathDelete, setPathDelete] = useState(false)

    const onShowConfirmModal = (id) => {

        setModalOpenConfirmation(true)

        setPathDelete(route('manager.events.sessions.destroy', [event.id, id]))

        console.log(route('manager.events.sessions.destroy', [event.id, id]))
    }
    return (
        <ManagerLayout title="Tipos de boleto">
            <div>
                <div className="flex items-end justify-between mb-4">
                    <CardEvent title={event.title} img={event.thum} category={event.category.name} subCategory={event.subCategory.name} />
                    <div>
                        <Link href={route('manager.events.sessions.create', event.id)} className='btn btn-primary ml-2' >Crear nuevo tipo de boleto</Link>
                    </div>
                </div>
                <div className="p-4 border rounded-md mt-6">
                    <table className="w-full table-list table-auto bg-white ">
                        <thead>
                            <tr>
                                <th> Session</th>

                                <th> Tipo de Ticket</th>
                                <th> Activo</th>
                                <th> Ultima actualización</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            {sessions.data.map((session, index) => (
                                <tr key={index}>
                                    <td className='whitespace-nowrap'>
                                        <TableTitleImage title={formatDate(session.date)} />
                                    </td>
                                    <td>
                                        <div className='flex flex-wrap gap-3  '>
                                            {session.ticket_types.map((ticket_type, index) => (
                                                <Badge key={index} color='gray'>{ticket_type.name} | {formatCurrency(ticket_type.price)}</Badge>
                                            ))}
                                        </div>

                                    </td>

                                    <td><ActiveBadge active={session.active} /></td>
                                    <td className='whitespace-nowrap font-medium lowercase text-gray-600 '>{formatDate(session.updated_at)}</td>
                                    <td className="text-right font-medium whitespace-nowrap">

                                        <div className="flex items-center">
                                            <Link href={route('manager.events.sessions.edit', [event.id, session.id])} className='font-medium text-indigo-600 hover:text-indigo-900'>
                                                Editar
                                            </Link>

                                            <button type="button" onClick={() => onShowConfirmModal(session.id)} className="font-medium text-red-500 hover:text-red-700 ml-3 "
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

export default SessionList
