import BannerSearch from "@/Components/BannerSearch";
import Layout from "@/Layouts/Layout";
import { Link } from "@inertiajs/inertia-react";
import React from "react";
import { TextLoop } from "react-text-loop-next";

import ItemList from "./ItemList";

const Home = ({ homeCategories }) => {
    return (
        <Layout title="Inicio">
            <BannerSearch img="/img/home/img-banner.jpg" search={true}>
                <div>
                    <h1 className="font-bold">
                        RESERVA TU ENTRADAS PARA TU
                        <TextLoop>
                            <Link
                                href={route("events")}
                                className="ml-1 text-emerald-400"
                                to="/"
                            >
                                PELÍCULAS
                            </Link>
                            <Link
                                href={route("events")}
                                className="ml-1 text-emerald-400"
                                to="/"
                            >
                                DEPORTES
                            </Link>
                            <Link
                                href={route("events")}
                                className="ml-1 text-emerald-400"
                                to="/"
                            >
                                EVENTOS
                            </Link>
                        </TextLoop>
                    </h1>
                    <p className="mt-5 font-medium md:text-xl xl:text-2xl">
                        Emisión de boletos segura y confiable. ¡Su boleto para
                        entretenimiento en vivo!
                    </p>
                </div>
            </BannerSearch>

            {homeCategories.map((item, key) => (
                <div key={key} className=" even:bg-dark-blue-800">
                    {/*Striped color bg-dark-blue-800 */}
                    <ItemList
                        title={item.name}
                        linkPath={route("events", { categories: [item.slug] })}
                        events={item.events}
                    />
                </div>
            ))}
        </Layout>
    );
};

export default Home;
