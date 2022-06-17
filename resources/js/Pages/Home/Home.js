import BannerHero from "@/Components/BannerHero";
import Layout from "@/Layouts/Layout";
import React from "react";
import CarouselCategories from "./CarouselCategories";
import CarouselHome from "./CarouselHome";

import ItemList from "./ItemList";
// modal para cancelar los boletos
const Home = ({ eventsFeacture, eventsFree, eventsCarousel }) => {

    return (
        <Layout title="Inicio">
            <BannerHero img="/img/home/img-banner.jpg" title="RESERVA BOLETOS PARA TUS EVENTOS FAVORITOS" desc="Emisión de boletos segura y confiable. ¡Su boleto para entretenimiento en vivo!" search={false} />

            <div className="container mt-16">
                <ItemList title="Destacados" linkPath={route("events")}>
                    <ItemList.Grid events={eventsFeacture} />
                </ItemList>

                <ItemList title="Peliculas"
                    linkPath={route("events", { 'categories': ['peliculas'] })} >
                    <CarouselHome eventsCarousel={eventsCarousel} />
                </ItemList>

                <ItemList title="Gratis" linkPath={route("events", { 'price': 'free' })}>
                    <ItemList.Grid events={eventsFree} />
                </ItemList>

                <ItemList title="Categorias" linkPath={route("events")}>
                    <CarouselCategories />
                </ItemList>

            </div>

        </Layout >
    );
};

export default Home;
