import ListDescription from "@/Components/ListDescription";
import { formatCurrency, formatDate } from "@/Helpers/Helpers";
import { ClockIcon, MapPinIcon, TicketIcon } from "@heroicons/react/24/outline";
import { Link } from "@inertiajs/react";
import React from "react";

const EventSidebar = ({ sessions, location, ticket_types }) => {
    return (
        <div className="space-y-6">
            <CardSideBar title="Fechas y horas" Icon={ClockIcon}>
                <div>
                    {sessions.map((item, key) => (
                        <div className="capitalize py-1" key={key}>
                            {item.dateFormat}
                        </div>
                    ))}
                </div>
            </CardSideBar>

            <CardSideBar title="Tipos de Boletos" Icon={TicketIcon}>
                {ticket_types.map((item, key) => (
                    <div
                        key={key}
                        className="py-1 flex items-start justify-between "
                    >
                        <div>{item.name} </div>
                        <div>
                            {item.price == 0
                                ? "Gratis"
                                : formatCurrency(item.price)}
                        </div>
                    </div>
                ))}
            </CardSideBar>

            <CardSideBar title="Ubicacion" Icon={MapPinIcon}>
                <div className="space-y-3">
                    <ListDescription title="Nombre del lugar">
                        {location.name}
                    </ListDescription>

                    <ListDescription title="Direccion">
                        <div>
                            {location.name}
                            <br />
                            {location.address}
                            {location.map && (
                                <a
                                    className="text-primary-500 ml-3 underline"
                                    target="_blank"
                                    href={location.map}
                                >
                                    Ver mapa
                                </a>
                            )}
                        </div>
                    </ListDescription>

                    <ListDescription title="Telefono">
                        {location.phone}
                    </ListDescription>
                </div>
            </CardSideBar>
        </div>
    );
};
const CardSideBar = ({ title, Icon, children }) => {
    return (
        <div className="flex grow flex-col px-5 pt-4 pb-5 overflow-hidden rounded-lg bg-white border ">
            <div className="overflow-hidden pb-2 grow">
                <div className="flex items-center">
                    {Icon && <Icon className="h-5 w-5 mr-2" />}
                    <h5 className="text-base font-medium leading-6 line-clamp-none lg:line-clamp-2 ">
                        {title}
                    </h5>
                </div>
            </div>

            <div className="border-t border-dashed border-slate-300 pt-3 text-sm  text-gray-700 ">
                {children}
            </div>
        </div>
    );
};

export default EventSidebar;
