import { formatCurrency, formatDate } from "@/Helpers/Helpers";
import { Link } from "@inertiajs/inertia-react";
import React from "react";

const EventSidebar = ({ sessions, location, ticket_types, slug }) => {
    return (
        <div className="space-y-10">

            <CardSideBar title="Fechas y horas">
                <div className="space-y-2">
                    {sessions.map((item, key) => (
                        <div className="capitalize" key={key}>
                            {formatDate(item.date)}
                        </div>
                    ))}
                </div>
            </CardSideBar>

            <CardSideBar title="Tipos de Boletos">
                {ticket_types.map((item, key) => (
                    <div key={key} className="p-2 odd:bg-dark-blue-800">
                        <div className="flex items-start justify-between gap-x-2">
                            <div>{item.name} </div>
                            <div>
                                {item.type == "free" ? "Gratis" : formatCurrency(item.price)}
                            </div>
                        </div>
                    </div>
                ))}
            </CardSideBar>

            <CardSideBar title="Ubicacion">
                <div className="space-y-3">
                    <div>
                        <div className=" text-xs font-medium text-emerald-500">
                            Nombre del lugar
                        </div>
                        <div className="block ">{location.name}</div>
                    </div>
                    <div>
                        <div className=" text-xs font-medium text-emerald-500">
                            Direccion
                        </div>
                        <div className="block ">
                            {location.address}
                            {location.map && (
                                <a
                                    className="text-emerald-500 ml-3 underline"
                                    target="_blank"
                                    href={location.map}
                                >
                                    Ver mapa
                                </a>
                            )}
                        </div>
                    </div>
                    <div>
                        <div className=" text-xs font-medium text-emerald-600">
                            Telefono
                        </div>
                        <div className="block ">{location.phone}</div>
                    </div>
                </div>
            </CardSideBar>

            <div>
                <Link
                    className="btn"
                    href={route("checkout", {
                        slug: slug,
                    })}
                >
                    RESERVAR ENTRADAS
                </Link>
            </div>
        </div>
    );
};
const CardSideBar = ({ title, children }) => {
    return (
        <div>
            <div className="text-xl font-semibold">{title}</div>
            <div className="mt-3 text-sm">{children}</div>
        </div>
    );
};

export default EventSidebar;
