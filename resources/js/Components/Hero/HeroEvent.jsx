import { formatDate } from "@/Helpers/Helpers";

import { CalendarDaysIcon, MapPinIcon } from "@heroicons/react/24/solid";

import React from "react";
import Hero from "./Hero";
import Badge from "../Badge";

const HeroEvent = ({ event, title, img = null, search = false }) => {
    return (
        <Hero img={img}>
            <div>
                <Badge color={event.category.color}>
                    {event.category.name}
                </Badge>
                <div className=" relative z-10 text-left mt-2">
                    <h1 className="text-5xl font-bold uppercase">{title}</h1>
                </div>
                <div className="flex mt-6 items-center opacity-60 ">
                    <MapPinIcon className="w-4 h-4  mr-2" />
                    <p className="font-light  ">{event.location.address}</p>
                </div>

                <div className="flex mt-3 items-center opacity-60 ">
                    <CalendarDaysIcon className="w-4 h-4  mr-2" />
                    <p className="font-light  ">
                        {formatDate(event.session.date)}
                    </p>
                </div>
            </div>
        </Hero>
    );
};
//
export default HeroEvent;
