import React from "react";
import { Link } from "@inertiajs/inertia-react";
import { FaCheck, FaHandshake, FaUsers } from "react-icons/fa";
const Section2 = () => {
    return (
        <div className="bg-dark-blue-700 lg:bg-transparent lg:bg-[url('/img/about/img-2.jpg')] lg:bg-[length:85%]  lg:bg-left  lg:bg-no-repeat">
            <div className="py-section container ">
                <div className=" grid lg:grid-cols-12">
                    <div className="rounded lg:col-span-8 lg:col-start-5 lg:bg-dark-blue-900 lg:p-8">
                        <p className="text-2xl uppercase text-emerald-400">
                            ECHA UN VISTAZO
                        </p>
                        <h2 className="mt-2">NUESTRA FILOSOFÍA</h2>
                        <div className="mt-4  ">
                            <p className="leading-7 text-white text-opacity-90">
                                Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do eiusmod tempor ut labore
                                et dolore magna aliqua. Quis ipsum suspendisse
                                ultrices gravida.
                            </p>
                            <div className="mt-8 flex flex-col gap-5">
                                <div className="flex items-center gap-3 text-xl font-medium">
                                    <FaHandshake className=" h-12 w-12 rounded-full border border-dark-blue-700 py-1.5 px-2 text-emerald-400" />
                                    <p>Honestidad y Justicia</p>
                                </div>

                                <div className="flex items-center gap-3 text-xl font-medium">
                                    <FaCheck className=" h-12 w-12 rounded-full border border-dark-blue-700 py-1.5 px-2 text-emerald-400" />
                                    <p>Claridad y Transparencia</p>
                                </div>

                                <div className="flex items-center gap-3 text-xl font-medium">
                                    <FaUsers className=" h-12 w-12 rounded-full border border-dark-blue-700 py-1.5 px-2 text-emerald-400" />
                                    <p>Centrarse en los clientes</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default Section2;
