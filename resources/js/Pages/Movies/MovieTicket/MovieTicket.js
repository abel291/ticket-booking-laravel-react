import SectionUnderBanner from "@/Components/SectionUnderBanner";
import Select from "@/Components/Select";
import Layout from "@/Layouts/Layout";
import React from "react";
import { FaCalendar, FaCity } from "react-icons/fa";
import BannerCheckout from "@/Components/BannerCheckout";
import TicketListPlan from "./TicketListPlan";

const MovieTicket = () => {
    const date = ["11/03/2021", "12/03/2021", "13/03/2021"];
    const country = [
        "Leticia",
        "Medellín",
        "Arauca",
        "Barranquilla",
        "Cartagena",
        "Tunja",
        "Manizales",
        "Florencia",
        "Yopal",
        "Popayán",
        "Valledupar",
        "Quibdó",
        "Montería",
        "Bogotá",
        "Inírida",
        "San José del Guaviare",
        "Neiva",
        "Riohacha",
        "Santa Marta",
        "Villavicencio",
        "Pasto",
        "Cúcuta",
        "Mocoa",
        "Armenia",
        "Pereira",
        "San Andrés",
        "Bucaramanga",
        "Sincelejo",
        "Ibagué",
        "Cali",
        "Mitú",
        "Puerto Carreño",
    ];
    return (
        <Layout title="Ticket">
            <BannerCheckout
                title="La Familia Mitchell Vs. Las Máquinas"
                lang="ENGLISH, HINDI TELEGU TAMIL"
            />
            <SectionUnderBanner>
                <div className="flex flex-col gap-6 md:flex-row">
                    <div className="flex items-center ">
                        <IconSelect>
                            <FaCity className="h-full w-full text-emerald-400" />
                        </IconSelect>
                        <LabelSelect>Ciudad</LabelSelect>
                        <Select
                            className="ml-2 w-full text-sm "
                            name="pen"
                            id=""
                        >
                            <option value=""></option>
                            {country.map((item) => (
                                <option key={item} value={item}>
                                    {item}
                                </option>
                            ))}
                        </Select>
                    </div>

                    <div className="flex items-center ">
                        <IconSelect>
                            <FaCalendar className="h-full w-full text-emerald-400" />
                        </IconSelect>
                        <LabelSelect>Fecha</LabelSelect>
                        <Select
                            className="ml-2 w-full text-sm"
                            name="pen"
                            id=""
                        >
                            {date.map((item) => (
                                <option key={item} value={item}>
                                    {item}
                                </option>
                            ))}
                        </Select>
                    </div>
                </div>
            </SectionUnderBanner>
            <div className="py-section container">
                <TicketListPlan />
            </div>
        </Layout>
    );
};
const LabelSelect = ({ children }) => {
    return <span className="ml-2 text-sm text-emerald-400">{children}</span>;
};
const IconSelect = ({ children }) => {
    return (
        <div className="h-9 w-9 flex-none rounded-full border border-white p-2">
            {children}
        </div>
    );
};

export default MovieTicket;
