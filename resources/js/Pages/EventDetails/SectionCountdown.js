import React from "react";
import { Link } from "@inertiajs/inertia-react";
import Countdown from "react-countdown";

import {
    FaAddressBook,
    FaChalkboardTeacher,
    FaCommentAlt,
    FaFacebookF,
    FaGoogle,
    FaMapMarkerAlt,
    FaTwitter,
    FaYoutube,
} from "react-icons/fa";
const SectionCountdown = () => {
    return (
        <div className="container relative">
            <div className="bg-gradient rounded py-10 px-7">
                <div className="flex flex-col items-center justify-between gap-5 lg:flex-row">
                    <div className="w-full lg:w-5/12">
                        <h4 className="font-semibold uppercase">
                            Cómo el juego puede generar nuevas ideas para tu
                            negocio
                        </h4>
                    </div>
                    <div className="">
                        <div className="flex flex-col items-center gap-5 xl:flex-row">
                            <div className="grow">
                                <Countdown
                                    date={Date.now() + 100000000}
                                    renderer={renderer}
                                />
                            </div>
                            <div>
                                <Link className="btn" href={route("home")}>
                                    RESERVAR ENTRADAS
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
                <div className="my-7 border-t border-white border-opacity-30"></div>
                <div className="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
                    <div className="flex  ">
                        <FaCommentAlt className="h-11 w-auto flex-none" />
                        <div className="ml-2 text-xs">
                            <span className="block">
                                5 días (viernes-martes)
                            </span>
                            <span className="mt-1 block">
                                Más de 20 talleres
                            </span>
                        </div>
                    </div>

                    <div className="flex  ">
                        <FaMapMarkerAlt className="h-11 w-auto flex-none" />
                        <div className="ml-2 text-xs">
                            <span className="block">Zhongzheng Rd.</span>
                            <span className="mt-1 block">8F., No. 788-1</span>
                        </div>
                    </div>
                    <div className="flex  ">
                        <FaAddressBook className="h-11 w-auto flex-none" />
                        <div className="ml-2 text-xs">
                            <span className="block">Escríbanos:</span>
                            <span className="mt-1 block">
                                <Link className="font-light text-emerald-400">
                                    hola@MyTicket.com
                                </Link>
                            </span>
                        </div>
                    </div>
                    <div className="">
                        <div className="flex gap-4 lg:justify-between  ">
                            <Link
                                href={route("home")}
                                className="flex-none rounded-full border border-white border-opacity-30 p-3 hover:bg-emerald-400"
                            >
                                <FaFacebookF className="h-4 w-full" />
                            </Link>
                            <Link className="flex-none rounded-full border border-white border-opacity-30 p-3 hover:bg-emerald-400">
                                <FaTwitter className="h-4 w-full" />
                            </Link>
                            <Link className="flex-none rounded-full border border-white border-opacity-30 p-3 hover:bg-emerald-400">
                                <FaGoogle className="h-4 w-full" />
                            </Link>
                            <Link className="flex-none rounded-full border border-white border-opacity-30 p-3 hover:bg-emerald-400">
                                <FaYoutube className="h-4 w-full" />
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};
const renderer = ({ days, hours, minutes, seconds }) => {
    return (
        <div className="flex gap-2 uppercase">
            <div className="text-center">
                <h3 className="font-semibold">{days}</h3>
                <span className="mt-2 text-sm font-light">Dias</span>
            </div>
            <span className="text-2xl text-white sm:text-3xl  md:text-4xl">
                :
            </span>
            <div className="text-center">
                <h3 className="font-semibold">{hours}</h3>
                <span className="mt-2 text-sm font-light">Horas</span>
            </div>
            <span className="text-2xl text-white sm:text-3xl  md:text-4xl">
                :
            </span>
            <div className="text-center">
                <h3 className="font-semibold">{minutes}</h3>
                <span className="mt-2 text-sm font-light">Minutos</span>
            </div>
            <span className="text-2xl text-white sm:text-3xl  md:text-4xl">
                :
            </span>
            <div className="text-center">
                <h3 className="font-semibold">{seconds}</h3>
                <span className="mt-2 text-sm font-light">Segundos</span>
            </div>
        </div>
    );
};
export default SectionCountdown;
