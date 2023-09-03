import TitleSection from "@/Components/TitleSection";
import { BuildingOffice2Icon, GlobeAmericasIcon, PresentationChartBarIcon, UserGroupIcon } from "@heroicons/react/24/outline";
import React, { useEffect, useState } from "react";


const Section3 = () => {
    return (

        <div className="py-section container">
            <div className="grid grid-cols-12 items-center gap-4">
                <div className="col-span-12 pb-10 lg:col-span-4 lg:pb-0 ">
                    <TitleSection title="HECHOS GRACIOSOS" subTitle="HECHOS RÁPIDOS" />

                    <p className="text mt-4">
                        Obtenga métricas escalables de manera objetiva,
                        mientras que los servicios proactivos potencian sin
                        problemas estrategias de crecimiento completamente
                        investigadas.
                    </p>
                </div>

                <IconMetric
                    Icon={UserGroupIcon}
                    title="Clientes"
                    metric="10M+"
                />
                <IconMetric
                    Icon={GlobeAmericasIcon}
                    title="Paises"
                    metric="11"
                />
                <IconMetric
                    Icon={BuildingOffice2Icon}
                    title="Pueblos, Ciudades"
                    metric="650+"
                />
                <IconMetric
                    Icon={PresentationChartBarIcon}
                    title="Pantallas"
                    metric="100M+"
                />
            </div>
        </div>

    );
};

const IconMetric = ({ Icon, title, metric }) => {
    return (
        <div className="col-span-6 text-center md:col-span-3 lg:col-span-2">
            <div className="flex flex-col items-center">
                <div>
                    <Icon className="text-primary-500 h-16 w-16" alt={title} />
                </div>
                <h3 className="mt-4 font-semibold lg:mt-5">{metric}</h3>
                <span className="font-medium text-primary-500 lg:mt-3">
                    {title}
                </span>
            </div>
        </div>
    );
};

export default Section3;

//terminar responsive "hechos graciosos"
