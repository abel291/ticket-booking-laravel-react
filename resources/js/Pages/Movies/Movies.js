import ItemCard from "@/Components/ItemCard";
import Layout from "@/Layouts/Layout";
import React, { useState } from "react";

import FilterCategories from "@/Pages/Filters/FilterCategories";
import FilterOrder from "@/Pages/Filters/FilterOrder";
import FilterPrice from "@/Pages/Filters/FilterPrice";
import FilterReset from "@/Pages/Filters/FilterReset";
import BannerMovies from "./BannerMovies";

const Movies = ({ items }) => {
    return (
        <Layout title="Peliculas">
            <BannerMovies />
            <div className="py-section container">
                <div className="grid grid-cols-1 gap-6 lg:grid-cols-10">
                    <div className="lg:col-span-2">
                        <FilterReset />

                        <div className=" space-y-6 ">
                            <FilterCategories />
                            <FilterPrice />
                        </div>
                    </div>
                    <div className="lg:col-span-8">
                        <FilterOrder />
                        <div className="mt-7 grid grid-cols-1 gap-5 sm:grid-cols-2 md:grid-cols-3">
                            {items.data.map((item, key) => (
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
