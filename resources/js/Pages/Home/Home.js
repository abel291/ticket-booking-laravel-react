import MovieCard from "@/Components/ItemCard";
import Layout from "@/Layouts/Layout";
import { Link } from "@inertiajs/inertia-react";
import React from "react";

import Banner from "./Banner";
import ItemList from "./ItemList";
import Search from "./Search";

const Home = () => {
    return (
        <Layout title="Inicio">
            <Banner />
            <Search />

            <ItemList
                title="Peliculas"
                linkText="Ver todas las peliculas"
                items={[1, 2, 3, 4, 5, 6]}
            />

            <div className="bg-dark-blue-800">
                <ItemList
                    title="Eventos"
                    linkText="Ver todos los Eventos"
                    items={[1, 2, 3, 4, 5, 6]}
                />
            </div>

            <ItemList
                title="Deportes"
                linkText="Ver todos los Deportes"
                items={[1, 2, 3, 4, 5, 6]}
            />
        </Layout>
    );
};

export default Home;
