import React, { useEffect, useState } from "react";
import { FaHouseDamage, FaUser, FaUsers } from "react-icons/fa";

const Section3 = () => {
    return (
        
            <div className="py-section container">
                <div className="grid grid-cols-12 items-center gap-4">
                    <div className="col-span-12 pb-10 lg:col-span-4 lg:pb-0 ">
                        <p className="sub-title">HECHOS RÁPIDOS</p>
                        <h2 className="mt-4">HECHOS GRACIOSOS</h2>
                        <p className="text mt-4">
                            Obtenga métricas escalables de manera objetiva,
                            mientras que los servicios proactivos potencian sin
                            problemas estrategias de crecimiento completamente
                            investigadas.
                        </p>
                    </div>
                    <IconMetric
                        img="/img/about/icon-1.png"
                        title="Clientes"
                        metric="10M+"
                    />
                    <IconMetric
                        img="/img/about/icon-2.png"
                        title="Paises"
                        metric="11"
                    />
                    <IconMetric
                        img="/img/about/icon-3.png"
                        title="Pueblos, Ciudades"
                        metric="650+"
                    />
                    <IconMetric
                        img="/img/about/icon-4.png"
                        title="Pantallas"
                        metric="100M+"
                    />
                </div>
            </div>
        
    );
};

const IconMetric = ({ img, title, metric }) => {
    return (
        <div className="col-span-6 text-center md:col-span-3 lg:col-span-2">
            <div className="flex flex-col items-center">
                <div>
                    <img src={img} className=" h-16 w-16" alt="" />
                </div>
                <h3 className="mt-4 font-semibold lg:mt-8">{metric}</h3>
                <span className="font-light text-emerald-400 lg:mt-3">
                    {title}
                </span>
            </div>
        </div>
    );
};

export default Section3;

//terminar responsive "hechos graciosos"
