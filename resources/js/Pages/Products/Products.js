import BannerSearch from "@/Components/BannerSearch";
import ItemCard from "@/Components/ItemCard";
import Select from "@/Components/Select";
import Layout from "@/Layouts/Layout";
import { Link } from "@inertiajs/inertia-react";
import React from "react";
import Categories from "./Categories";
import Filter from "./Filter";

const Products = () => {
    return (
        <Layout title="Inicio">
            <BannerSearch img="/img/home/img-banner.jpg">
                <div>
                    <h1>
                        CONSIGUE{" "}
                        <span className="text-emerald-400">Tickets</span> DE
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
                    <div className="lg:col-span-3">
                        <Filter />
                    </div>
                    <div className="lg:col-span-7">
                        <div className="grid grid-cols-1 gap-5 sm:grid-cols-2 md:grid-cols-3">
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

export const WidgetCheck = ({ title, children }) => {
    return (
        <div className="rounded-md bg-dark-blue-700 p-7">
            <div className="border-b border-dark-blue-400 pb-3">
                <h6 className="font-semibold">{title}</h6>
            </div>
            <div className="mt-5">{children}</div>
        </div>
    );
};

export default Products;
