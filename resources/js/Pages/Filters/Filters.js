import ItemCard from "@/Components/ItemCard";
import Pagination from "@/Components/Pagination";
import Layout from "@/Layouts/Layout";
import React, { useState, useEffect } from "react";

import BannerMovies from "./BannerMovies";
import FilterCategories from "./FilterCategories";
import FilterOrder from "./FilterOrder";
import FilterPrice from "./FilterPrice";
import FilterReset from "./FilterReset";
import FilterFormat from "./FilterFormat";
import ItemsLoading from "./ItemsLoading";
import { Inertia } from "@inertiajs/inertia";

const Filters = ({ events }) => {
    const [loading, setLoading] = useState(false);
    Inertia.on("start", () => setLoading(true));
    Inertia.on("finish", () => setLoading(false));

    return (
        <Layout title="Eventos">
            <BannerMovies />
            <div className="py-section container">
                <div className="grid grid-cols-1 gap-5 lg:grid-cols-10">
                    <div className="lg:col-span-3 xl:col-span-2">
                        <FilterReset />
                        <div className=" space-y-5 ">
                            <FilterCategories />
                            <FilterFormat />
                            <FilterPrice />
                        </div>
                    </div>
                    <div className="lg:col-span-7 xl:col-span-8">
                        <FilterOrder />
                        {events.data.length ? (
                            <>
                                {loading ? (
                                    <ItemsLoading />
                                ) : (
                                    <>
                                        <div className="mt-7 grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-3">
                                            {events.data.map((item, key) => (
                                                <ItemCard
                                                    key={key}
                                                    event={item}
                                                />
                                            ))}
                                        </div>
                                        <div className="mt-7">
                                            <Pagination data={events} />
                                        </div>
                                    </>
                                )}
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
