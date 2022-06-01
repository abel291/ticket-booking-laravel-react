import ItemCard from "@/Components/ItemCard";
import Pagination from "@/Components/Pagination";
import Layout from "@/Layouts/Layout";
import React, { useState } from "react";
import FilterCategories from "./FilterCategories";
import FilterOrder from "./FilterOrder";
import FilterPrice from "./FilterPrice";
import FilterReset from "./FilterReset";
import FilterFormat from "./FilterFormat";
import ItemsLoading from "./ItemsLoading";
import { Inertia } from "@inertiajs/inertia";
import BannerFilters from "./BannerFilters";
import BannerSearch, { BannerContent, BannerTitle } from "@/Components/BannerSearch";

const Filters = ({ events }) => {
    const [loading, setLoading] = useState(false);
    Inertia.on("start", () => setLoading(true));
    Inertia.on("finish", () => setLoading(false));

    return (
        <Layout title="Eventos">

            {/* <BannerSearch img="/img/movies.jpg" search={false}>
                <BannerTitle>
                    CONSIGUE <span className="text-emerald-400">TICKETS</span>{" "}
                    DE CINE
                </BannerTitle>
                <BannerContent>
                    Compre Tickets de cine por adelantado, encuentre horarios de
                    películas, vea avances, lea reseñas de películas y mucho más
                </BannerContent>

            </BannerSearch> */}

            <div className="py-section container mt-[97px]">
                <div className="grid grid-cols-1 gap-8 lg:grid-cols-10">
                    <div className="lg:col-span-3 xl:col-span-2">
                        <FilterReset />
                        <div className=" space-y-8 ">
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
                                        <div className="mt-7 grid grid-cols-1 gap-8 sm:grid-cols-2 xl:grid-cols-3">
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
