import BannerSearch from "@/Components/BannerSearch";
import ItemCard from "@/Components/ItemCard";

import Layout from "@/Layouts/Layout";
import React from "react";
import Search from "../../Home/Search";
import Filter from "./Filter";
import Order from "./Order";

const MovieList = () => {
    return (
        <Layout title="Inicio">
            <BannerSearch img="/img/home/img-banner.jpg" search={true}>
                <div>
                    <h1 className="font-bold">
                        CONSIGUE{" "}
                        <span className="text-emerald-400">TICKETS</span> DE
                        CINE
                    </h1>
                    <p className="mt-5 font-medium md:text-xl xl:text-2xl">
                        Compre Tickets de cine por adelantado, encuentre
                        horarios de películas, vea avances, lea reseñas de
                        películas y mucho más
                    </p>
                </div>
            </BannerSearch>
            <div>
                <Search />
            </div>
            <div className="py-section container">
                <div className="grid grid-cols-1 gap-6 lg:grid-cols-10">
                    <div className="lg:col-span-3">
                        <Filter />
                    </div>
                    <div className="lg:col-span-7">
                        <Order/>
                        <div className="mt-7 grid grid-cols-1 gap-5 sm:grid-cols-2 md:grid-cols-3">
                            {[1, 2, 3, 4, 5, 6].map((item, key) => (
                                <div key={key}>
                                    <ItemCard item={item} />
                                </div>
                            ))}
                        </div>
                    </div>
                </div>
            </div>
        </Layout>
    );
};

export default MovieList;
