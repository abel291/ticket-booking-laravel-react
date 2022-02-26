import { Link } from "@inertiajs/inertia-react";
import React from "react";
import TextLoop from "react-text-loop/lib/components/TextLoop";

const Banner = () => {
    return (
        <div className="relative px-4 lg:px-0 lg:pb-[150px]">
            <div className="flex min-h-screen items-center justify-center pt-navbar">
                <div className="relative z-10 max-w-4xl text-center  ">
                    <h1 className="text-4xl font-bold leading-tight sm:text-5xl md:text-6xl lg:text-7xl  xl:text-[80px]">
                        RESERVA TU ENTRADAS PARA TU
                        <TextLoop>
                            <Link className="ml-1 text-emerald-400" to="/">
                                PELÍCULAS
                            </Link>
                            <Link className="ml-1 text-emerald-400" to="/">
                                DEPORTES
                            </Link>
                            <Link className="ml-1 text-emerald-400" to="/">
                                EVENTOS
                            </Link>
                        </TextLoop>
                    </h1>
                    <p className="mt-5 font-medium md:text-xl xl:text-2xl">
                        Emisión de boletos segura y confiable. ¡Su boleto para
                        entretenimiento en vivo!
                    </p>
                </div>
            </div>
            <div
                className="absolute inset-0 bg-gradient-to-r from-purple-700 to-blue-700 opacity-40
            before:absolute
            before:inset-0 before:bg-[url('/img/home/img-banner.jpg')]            
            before:bg-cover            
            before:bg-center   
            before:bg-no-repeat         
            before:opacity-50         
            before:content-['']
            "
            ></div>
        </div>
    );
};

export default Banner;
