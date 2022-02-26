import { Link } from "@inertiajs/inertia-react";
import React from "react";

const Section1 = () => {
    return (
        <div className="py-section container">
            <div className="grid lg:grid-cols-2 gap-4">
                <div>
                    <p className="text-2xl uppercase text-emerald-400">
                        somos MyTycket
                    </p>
                    <h2 className="mt-2">conócenos</h2>
                    <div className="mt-4 space-y-6 ">
                        <p className="text-white text-opacity-90 leading-7">
                            Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit, sed do eiusmod tempor ut labore et dolore
                            magna aliqua. Quis ipsum suspendisse ultrices
                            gravida.
                        </p>
                        <p className=" text-white text-opacity-90 leading-7">
                            Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit, sed do eiusmod tempor ut labore et dolore
                            magna aliqua. Quis ipsum suspendisse ultrices
                            gravida.Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit
                        </p>
                        <Link className="btn ">RESERVAR ENTRADAS</Link>
                    </div>
                </div>
                <div className="hidden lg:block">
                    <img
                        src="/img/about/img-1.png"
                        alt=""
                        className="object-lefts h-full object-cover"
                    />
                </div>
            </div>
        </div>
    );
};

export default Section1;
