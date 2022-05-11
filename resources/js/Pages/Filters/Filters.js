import ItemCard from "@/Components/ItemCard";
import Pagination from "@/Components/Pagination";
import Layout from "@/Layouts/Layout";
import React, { useState } from "react";

import BannerMovies from "./BannerMovies";
import BannerEvents from "./BannerEvents";
import BannerSports from "./BannerSports";

import FilterCategories from "./FilterCategories";
import FilterOrder from "./FilterOrder";
import FilterPrice from "./FilterPrice";
import FilterReset from "./FilterReset";
import FilterExperieces from "./FilterExperieces";
import FilterIdioms from "./FilterIdioms";


const Filters = ({ title, items, type }) => {
    return (
        <Layout title={title}>
            {type === "movie" && <BannerMovies />}
            {type === "event" && <BannerEvents />}
            {type === "sport" && <BannerSports />}
            <div className="py-section container">
                <div className="grid grid-cols-1 gap-6 lg:grid-cols-10">
                    <div className="lg:col-span-2">
                        <FilterReset />

                        <div className=" space-y-6 ">
                            <FilterCategories
                                title={
                                    type == "movie" ? "Generos" : "Categorias"
                                }
                            />
                            {/* {type === "movie" && <FilterIdioms />}
                            {type === "movie" && <FilterExperieces />} */}
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
                        <div className="mt-5">
                            <Pagination data={items} />
                        </div>
                    </div>
                </div>
            </div>
        </Layout>
    );
};

export default Filters;
