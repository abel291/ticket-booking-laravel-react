import React from "react";
import { Link, usePage } from "@inertiajs/inertia-react";
import Button from "@/Components/Button";
const Newsletter = () => {
    return (
        <div className="relative overflow-hidden rounded-3xl py-8 px-4  md:py-12 md:px-5">
            <div className="relative z-10  mx-auto max-w-2xl text-center">
                <p className=" text-lg font-medium uppercase text-emerald-400 md:text-2xl">
                    Suscríbete a MyTicket
                </p>
                <h3 className="  mt-4 text-2xl font-bold uppercase md:text-4xl">
                    PARA OBTENER BENEFICIOS EXCLUSIVOS
                </h3>
                <div className="mt-12 flex h-12 w-full items-stretch rounded-full border border-white border-opacity-30 pl-5 shadow">
                    <input
                        type="text"
                        className="w-full grow border-none bg-inherit placeholder:text-white focus:ring-0"
                        placeholder="Email"
                    />
                    <Button>Suscribirse</Button>
                </div>
                <p className=" mt-8  font-light">
                    Respetamos su privacidad, por lo que nunca compartimos su
                    información.
                </p>
            </div>
            <div className="absolute inset-0 bg-gradient-to-r from-purple-700 to-blue-700"></div>
        </div>
    );
};

export default Newsletter;
