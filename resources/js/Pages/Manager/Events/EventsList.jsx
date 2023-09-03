
import ActiveBadge from '@/Components/ActiveBadge';
import Button from '@/Components/Button';


import Input from '@/Components/Input';
import { formatDate } from '@/Helpers/Helpers';

import { CalendarDaysIcon, ExclamationCircleIcon, TicketIcon, ChevronDownIcon } from '@heroicons/react/24/outline';
import { Link, useForm, usePage } from '@inertiajs/react';
import React from 'react'

import ManagerLayout from '@/Layouts/ManagerLayout';
import TableTitleImage from '@/Components/Table/TableTitleImage';

import Modal from '@/Components/Modal';

import { useState } from 'react';
import ModalConfirmationDelete from '../ModalConfirmationDelete';
import Dropdown from '../Dropdown';
import Badge from '@/Components/Badge';


const EventsList = ({ events, filters }) => {

    const { setData, data, get, processing } = useForm({
        search: filters.search || ""
    });

    const handleSubmit = (e) => {
        e.preventDefault()
        get(route('manager.events.index'))
    }
    const [modalOpenConfirmation, setModalOpenConfirmation] = useState(false)
    const [pathDelete, setPathDelete] = useState(false)
    const onShowConfirmModal = (id) => {
        console.log(id)
        setModalOpenConfirmation(true)
        setPathDelete(route('manager.events.destroy', id))
    }

    return (
        <ManagerLayout title="Mis Eventos">
            <div>
                <div className="flex justify-between mb-4">
                    <form className="flex " onSubmit={handleSubmit}>
                        <Input handleChange={(e) => setData('search', e.target.value)} value={data.search} placeholder={"Busqueda"} />
                        <Button className='ml-2' processing={processing}>Buscar</Button>
                    </form>
                    <div>
                        <Link href={route('manager.events.create')} className='btn btn-primary ml-2' >Crear Evento</Link>
                    </div>
                </div>

                <div className="p-4 border rounded-md">
                    <table className="w-full table-list table-auto bg-white ">
                        <thead>
                            <tr>
                                <th> Nombre</th>
                                <th> Estado</th>
                                <th> Tickets Vendidos</th>
                                <th> Activo</th>
                                <th> Ultima actualización</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            {events.data.map((event, index) => (
                                <tr key={index}>
                                    <td>
                                        <TableTitleImage title={event.title} subTitle={event.subCategory.name} img={event.thum}
                                            path={route('event', event.slug)} />
                                    </td>
                                    <td><Badge color={event.status_color} >{event.status}</Badge></td>
                                    <td className='font-medium'>{event.ticket_types_sum}/{event.ticket_sales_sum}</td>
                                    <td><ActiveBadge active={event.active} /></td>
                                    <td>{event.updated_at}</td>
                                    <td className="text-right  whitespace-nowrap">

                                        <div className="flex items-center">
                                            <Dropdown>
                                                <Dropdown.Trigger>
                                                    <div className="inline-flex font-medium items-center rounded-md text-blue-600">
                                                        Editar
                                                        <ChevronDownIcon className="w-4 h-4 ml-1 " aria-hidden="true" />
                                                    </div>
                                                </Dropdown.Trigger>
                                                <Dropdown.Content width="w-64" >

                                                    <Dropdown.Link method="get" href={route('manager.events.edit', event.id)}  >
                                                        <div className="flex items-center font-normal ">
                                                            <ExclamationCircleIcon className="w-5 h-5 mr-2" />
                                                            <span>Datos Basicos</span>
                                                        </div>
                                                    </Dropdown.Link>
                                                    <Dropdown.Link method="get"
                                                        href={route('manager.events.ticket_types.index', event.id)}   >
                                                        <div className="flex items-center font-normal ">
                                                            <TicketIcon className="w-5 h-5 mr-2" />
                                                            <span>Tipo de Boleto</span>
                                                        </div>
                                                    </Dropdown.Link>
                                                    <Dropdown.Link method="get"
                                                        href={route('manager.events.sessions.index', event.id)} >
                                                        <div className="flex items-center font-normal ">
                                                            <CalendarDaysIcon className="w-5 h-5 mr-2" />
                                                            <span>Sesiones</span>
                                                        </div>
                                                    </Dropdown.Link>
                                                </Dropdown.Content>
                                            </Dropdown >

                                            <button type="button" onClick={() => onShowConfirmModal(event.id)} className="font-medium text-red-500 hover:text-red-700 ml-3 "
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

export default EventsList
