import { Link } from "@inertiajs/inertia-react";
import React from "react";

const TicketListPlan = () => {
    return (
        <div className="divide-y divide-dark-blue-500 bg-dark-blue-800">
            {[1, 2, 3, 4, 5].map((item) => (
                <div
                    key={item}
                    className="flex flex-col divide-dark-blue-500  lg:flex-row lg:divide-x"
                >
                    <div className="grid w-full p-7 pb-0 lg:w-5/12 lg:pb-7">
                        <div className="lg:place-self-center">
                            <div className="text-xl font-semibold uppercase">
                                GENESIS CINEMA
                            </div>
                            <span className="text-xs opacity-75">
                                Centro Comercial Buenaventura Vista Place
                                Guarenas, Av. Intercomunal Guarenas, Guatire .
                            </span>
                        </div>
                    </div>
                    <div className="w-full p-7 lg:w-7/12 ">
                        <ListTicketHour />
                    </div>
                </div>
            ))}
        </div>
    );
};

const TicketHour = () => {
    return (
        <Link className=" ticket grid  bg-dark-blue-700 px-4 py-3 transition-colors duration-150 hover:bg-emerald-400">
            <div className="place-self-center font-medium leading-[normal]">
                12:30 PM
            </div>
        </Link>
    );
};
const ListTicketHour = () => {
    return (
        <div className=" divide-y divide-dark-blue-500 lg:divide-y-0">
            {[1, 2, 3, 4].map((item) => (
                <div
                    key={item}
                    className="flex items-center gap-4 py-4 md:flex-row"
                >
                    <div className="flex gap-4 flex-none">
                        <div>ESP</div>
                        <div>Sala {item}</div>
                    </div>
                    <div className="flex flex-wrap gap-4">
                        {[1, 2, 3, 4].map((key) => (
                            <TicketHour key={key} />
                        ))}
                    </div>
                </div>
            ))}
        </div>
    );
};
export default TicketListPlan;
