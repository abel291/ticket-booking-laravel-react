import ItemCard from "@/Components/ItemCard";
import Layout from "@/Layouts/Layout";
import React, { useState } from "react";

import FilterCategories from "@/Pages/Filters/FilterCategories";
import FilterOrder from "@/Pages/Filters/FilterOrder";
import FilterPrice from "@/Pages/Filters/FilterPrice";
import FilterReset from "@/Pages/Filters/FilterReset";
import BannerMovies from "../Filters/BannerMovies";
import BannerSearch from "@/Components/BannerSearch";

const Movies = ({ items, image }) => {
    return (
        <Layout title="Peliculas">
            <BannerSearch img={image} search={true}>
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

            <div className="py-section container">
                <div className="grid grid-cols-1 gap-6 lg:grid-cols-10">
                    <div className="lg:col-span-2">
                        <FilterReset />

                        <div className=" space-y-6 ">
                            <FilterCategories title="Generos"/>
                            <FilterPrice />
                        </div>
                    </div>
                    <div className="lg:col-span-8">
                        <FilterOrder />
                        <div className="mt-7 grid grid-cols-1 gap-5 sm:grid-cols-2 md:grid-cols-3">
                            {items.map((item, key) => (
                                <ItemCard key={key} item={item} />
                            ))}
                        </div>
                    </div>
                </div>
            </div>
        </Layout>
    );
};

export default Movies;
