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
import FilterFormat from "./FilterFormat";
import FilterIdioms from "./FilterIdioms";

const Filters = ({ events }) => {
    return (
        <Layout title="Eventos">
            <BannerMovies />
            <div className="py-section container">
                <div className="grid grid-cols-1 gap-6 lg:grid-cols-10">
                    <div className="lg:col-span-2">
                        <FilterReset />

                        <div className=" space-y-6 ">
                            <FilterCategories />
                            <FilterFormat />
                            <FilterPrice />
                        </div>
                    </div>
                    <div className="lg:col-span-8">
                        <FilterOrder />
                        {events.data.length ? (
                            <>
                                <div className="mt-7 grid grid-cols-1 gap-5 sm:grid-cols-2 md:grid-cols-3">
                                    {events.data.map((item, key) => (
                                        <ItemCard key={key} event={item} />
                                    ))}
                                </div>
                                <div className="mt-5">
                                    <Pagination data={events} />
                                </div>
                            </>
                        ) : (
                            <div className="mt-7 text-center text-lg">
                                <span>No hay resultados</span>
                            </div>
                        )}
                    </div>
                </div>
            </div>
        </Layout>
    );
};

export default Filters;
