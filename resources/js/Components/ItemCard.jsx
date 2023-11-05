import { formatCurrency, formatDate } from "@/Helpers/Helpers";
import { Link } from "@inertiajs/react";

import React from "react";
import Badge from "./Badge";
import { MapPinIcon } from "@heroicons/react/24/solid";

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
            <div className="flex h-full flex-col overflow-hidden rounded bg-white border ">
                <div className="relative overflow-hidden">
                    <img
                        src={event.thum}
                        alt={event.title}
                        className="w-full transition hover:scale-105"
                    />
                    {/* {event.price!=null && (
                        <div className="absolute pt-2 px-2 pb-1 rounded-b right-3 top-0 bg-primary-500 text-center">
                            <span className=" block font-medium text-sm">desde</span>
                            <span className=" block font-bold ">{formatCurrency(event.price)}</span>
                        </div>
                    )} */}
                </div>
                <div className="flex grow flex-col px-5 pt-4 pb-5  ">
                    <div className="overflow-hidden h-14">
                        <h5 className=" text-lg font-semibold line-clamp-none lg:line-clamp-2 ">
                            {event.title}
                        </h5>
                    </div>

                    <div className="pt-4 text-sm  text-gray-700 flex grow flex-col justify-between ">

                        <div className="line-clamp-none lg:line-clamp-2">
                            <span>{event.location.address}</span>
                        </div>
                        <div className=" gap-x-3 mt-2 flex justify-between items-end">
                            <div className=" text-gray-400">
                                {event.duration}
                            </div>
                            <div className="mt-1.5 text-gray-400">
                                {event.session.dateFormatShort}
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </Link>
    );
};

export default ItemCard;
