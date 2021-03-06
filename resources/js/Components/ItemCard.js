import { formatCurrency } from "@/Helpers/Helpers";
import { Link } from "@inertiajs/inertia-react";
import { format } from "prettier";
import React from "react";
import { FaSplotch } from "react-icons/fa";
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
            <div className="flex h-full flex-col overflow-hidden rounded bg-dark-blue-700">
                <div className="relative overflow-hidden">
                    <img
                        src={event.thumb}
                        alt="movie"
                        className="w-full transition hover:scale-105"
                    />
                    {/* {event.price!=null && (
                        <div className="absolute pt-2 px-2 pb-1 rounded-b right-3 top-0 bg-emerald-500 text-center">
                            <span className=" block font-medium text-sm">desde</span>
                            <span className=" block font-bold ">{formatCurrency(event.price)}</span>
                        </div>
                    )} */}
                </div>
                <div className="flex grow flex-col p-5 ">
                    <div className="overflow-hidden  pb-2">
                        <h5 className=" text-xl font-medium uppercase line-clamp-none lg:line-clamp-2 ">
                            {event.title}
                        </h5>
                    </div>

                    <div className="grow border-t border-dashed border-dark-blue-400 pt-2 ">
                        <div className="flex justify-between text-xs ">
                            <div className="inline-block font-medium text-emerald-400 capitalize">
                                {dtf.format(new Date(event.session.date))}
                            </div>
                            <div className="inline-block  font-medium text-emerald-400">
                                {event.duration}
                            </div>
                        </div>
                        <div className=" mt-3 text-sm  line-clamp-none lg:line-clamp-2">
                            <span>{event.location.address}</span>
                        </div>
                    </div>
                </div>
            </div>
        </Link>
    );
};

export default ItemCard;
