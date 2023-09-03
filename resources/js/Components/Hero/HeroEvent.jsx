
import { formatDate } from "@/Helpers/Helpers";

import { CalendarDaysIcon, MapPinIcon } from "@heroicons/react/24/solid";

import React from "react";
import Hero from "./Hero";


const HeroEvent = ({ event, title, img = null, search = false }) => {
    return (
        <Hero img={img}>
            <div>
                <div className="bg-white text-gray-700 inline-block px-3 py-1 mb-4 rounded-full text-sm font-bold">
                    {event.category.name}
                </div>
                <div className=" relative z-10 text-left">
                    <h1 className="text-5xl font-bold uppercase">{title}</h1>
                </div>
                <div className="flex mt-6 items-center ">
                    <MapPinIcon className="w-5 h-5 mr-2" />
                    <p className="font-medium  ">{event.location.address}</p>
                </div>

                <div className="flex mt-3 items-center ">
                    <CalendarDaysIcon className="w-5 h-5 mr-2" />
                    <p className="font-medium  ">{formatDate(event.session.date)}</p>
                </div>
            </div>
        </Hero>
    );
};
//
export default HeroEvent
    ;
