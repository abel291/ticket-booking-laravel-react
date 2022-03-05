import SectionUnderBanner from "@/Components/SectionUnderBanner";

import { Link } from "@inertiajs/inertia-react";
import React from "react";
import {
    FaFacebookF,
    FaTwitter,
    FaGoogle,
    FaYoutube,
    FaHeart,
    FaCalendar,
    FaRegClock,
    FaRegCalendarAlt,
} from "react-icons/fa";

const Banner = () => {
    return (
        <>
            <div className="relative z-10 pt-64 pb-8 ">
                <div
                    style={{ backgroundImage: "url(/img/movie/banner.png)" }}
                    className={
                        "absolute inset-0 bg-cover bg-center bg-no-repeat brightness-75 before:absolute before:inset-0 before:bg-gradient-to-t before:from-dark-blue-900  before:content-[''] "
                    }
                ></div>
                <div className="container relative">
                    <div className="  grid grid-cols-1 gap-8 lg:grid-cols-12">
                        <div className="relative hidden lg:col-span-3 lg:block">
                            <img
                                className="absolute top-0 right-0 max-h-[400px] rounded"
                                src="/img/movie/card.jpg"
                                alt="movie-img"
                            />
                        </div>
                        <div className=" lg:col-span-9 ">
                            <h3 className="font-bold">
                                La Familia Mitchell Vs. Las Máquinas
                            </h3>
                            <Idioms />
                            <Category />

                            <div className="mt-4 flex justify-between text-sm font-light text-blue-300">
                                <Duraction />
                                <IconSocial />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <SectionUnderBanner>
                <div className="grid grid-cols-1 gap-8 lg:grid-cols-12">
                    <div className="lg:col-span-9 lg:col-start-4 ">
                        <div className="flex  flex-col items-center gap-8 lg:flex-row lg:justify-between">
                            <div>
                                <Counter />
                            </div>
                            <div>
                                <Link className="btn" href={route("home")}>
                                    RESERVAR ENTRADAS
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </SectionUnderBanner>
        </>
    );
};

const Idioms = () => {
    return (
        <div className="mt-2 flex flex-wrap gap-2 text-sm text-blue-300">
            {[1, 2, 3, 4, 5].map((item, key) => (
                <Link
                    className="font-light uppercase "
                    key={key}
                    href={route("home")}
                >
                    Idioma
                </Link>
            ))}
        </div>
    );
};
const Category = () => {
    return (
        <div className="mt-5 flex flex-wrap gap-2  text-sm text-blue-300">
            {[1, 2, 3, 4, 5].map((item, key) => (
                <Link
                    className=" inline-block rounded-full border border-dark-blue-400 py-1 px-3 font-light uppercase "
                    key={key}
                    href={route("home")}
                >
                    Horror
                </Link>
            ))}
        </div>
    );
};
const Duraction = () => {
    return (
        <div className="flex gap-4">
            <div className="flex items-center">
                <FaRegCalendarAlt className="mr-1 h-3 w-3" />
                <span>06 Dec, 2020</span>
            </div>
            <div className="flex items-center">
                <FaRegClock className="mr-1 h-3 w-3" />
                <span>01:54:02</span>
            </div>
        </div>
    );
};
const IconSocial = () => {
    return (
        <div className="flex gap-4">
            <div className="item-center flex">
                <FaFacebookF className="h-4 w-full" />
            </div>
            <div className="item-center flex">
                <FaTwitter className="h-4 w-full" />
            </div>
            <div className="item-center flex">
                <FaGoogle className="h-4 w-full" />
            </div>
            <div className="item-center flex">
                <FaYoutube className="h-4 w-full" />
            </div>
        </div>
    );
};
const Counter = () => {
    return (
        <div className="items-strech flex gap-4 lg:gap-8 ">
            <div>
                <div className=" flex h-10 items-center justify-center">
                    <img
                        src="/img/movie/tomato.png"
                        alt="movie-img"
                        className="mr-3 h-full"
                    />
                    <div>88%</div>
                </div>
                <p className="mt-2">Tomatemetro</p>
            </div>

            <div>
                <div className=" flex h-10 items-center justify-center">
                    <img
                        src="/img/movie/popcorn.png"
                        alt="movie-img"
                        className="mr-3 h-full"
                    />
                    <div>88%</div>
                </div>
                <p className="mt-2">Audiencia</p>
            </div>

            <div>
                <div className=" flex h-10 items-center justify-center">
                    <div className="text-2xl text-white">4.5</div>
                    <div className="ml-3 flex gap-1">
                        <FaHeart className="h-4 w-4 text-red-500" />
                        <FaHeart className="h-4 w-4 text-red-500" />
                        <FaHeart className="h-4 w-4 text-red-500" />
                        <FaHeart className="h-4 w-4 text-red-500" />
                    </div>
                </div>
                <p className="mt-2">Calificación</p>
            </div>
        </div>
    );
};
export default Banner;
