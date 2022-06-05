import BannerSearch from "@/Components/BannerSearch";
import ItemCard from "@/Components/ItemCard";
import Layout from "@/Layouts/Layout";
import { Link } from "@inertiajs/inertia-react";
import React from "react";
import { TextLoop } from "react-text-loop-next";
import CarouselCategories from "./CarouselCategories";
import CarouselHome from "./CarouselHome";

import ItemList from "./ItemList";

const Home = ({ eventsFeacture, eventsFree, eventsCarousel }) => {

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

            <div className="container mt-16">

                <ItemList
                    title="Destacados"
                    linkPath={route("events")}

                >
                    <ItemList.Grid events={eventsFeacture} />
                </ItemList>

                <ItemList
                    title="Especiales"
                >
                    <CarouselHome eventsCarousel={eventsCarousel} />
                </ItemList>

                <ItemList
                    title="Gratis"
                    linkPath={route("events")}
                >
                    <ItemList.Grid events={eventsFree} />

                </ItemList>

                <ItemList
                    title="Categorias"
                    linkPath={route("events")}
                >
                    <CarouselCategories />

                </ItemList>


            </div>


        </Layout >
    );
};

export default Home;
