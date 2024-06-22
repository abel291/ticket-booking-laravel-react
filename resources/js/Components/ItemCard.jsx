import { formatCurrency, formatDate } from "@/Helpers/Helpers";
import { Link } from "@inertiajs/react";

import React from "react";
import Badge from "./Badge";
import { CalendarDaysIcon, MapIcon } from "@heroicons/react/24/solid";
import { ClockIcon, MapPinIcon } from "@heroicons/react/24/outline";

const dtf = new Intl.DateTimeFormat("es", {
    weekday: "long",
    day: "2-digit",
    //year: "2-digit",
    month: "short",
    hour: "2-digit",
    minute: "2-digit",
    hourCycle: "h12",
});
const ItemCard = ({ event }) => {
    return (
        <Link href={route("event", { slug: event.slug })}>
            <div
                className="flex h-full flex-col overflow-hidden rounded-lg
            border border-black/10 bg-white"
            >
                <div className="relative overflow-hidden">
                    <img
                        src={event.thum}
                        alt={event.title}
                        className="w-full max-w-full transition hover:scale-105 aspect-video object-cover object-center"
                    />
                    {/* {event.price!=null && (
                        <div className="absolute pt-2 px-2 pb-1 rounded-b right-3 top-0 bg-primary-500 text-center">
                            <span className=" block font-medium text-sm">desde</span>
                            <span className=" block font-bold ">{formatCurrency(event.price)}</span>
                        </div>
                    )} */}
                </div>
                <div className="flex grow flex-col px-6 py-5  ">
                    <span className="inline-block text-primary-400 text-sm font-medium">
                        {event.category.name}
                    </span>
                    <div className="overflow-hidden mt-1 ">
                        <h5 className="text-lg font-semibold tracking-tight text-gray-900 dark:text-white">
                            {event.title}
                        </h5>
                    </div>

                    <div className="text-sm flex items-end justify-between grow mt-3">
                        <div className=" space-y-1.5 opacity-80  items-end ">
                            <div className="flex items-center">
                                <MapPinIcon className="w-5 h-5 mr-1.5" />
                                <div>{event.location.name}</div>
                            </div>

                            <div className="flex items-center">
                                <ClockIcon className="w-5 h-5 mr-1.5" />
                                <div>{event.duration}</div>
                            </div>
                            <div className="flex items-center">
                                <CalendarDaysIcon className="w-5 h-5 mr-1.5" />
                                <div>{event.session.dateFormatShort}</div>
                            </div>
                        </div>
                        <div>{}</div>
                    </div>
                </div>
            </div>
        </Link>
    );
};

export default ItemCard;
