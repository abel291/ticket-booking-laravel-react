import BannerSearch from "@/Components/BannerSearch";
import ItemCard from "@/Components/ItemCard";
import Pagination from "@/Components/Pagination";
import Layout from "@/Layouts/Layout";
import { Link } from "@inertiajs/inertia-react";
import React from "react";
import { TextLoop } from "react-text-loop-next";
import Search from "../Home/Search";

const EventSearch = ({ items, filters }) => {
    console.log(items);
    return (
        <Layout title="Busquedas">
            <BannerSearch img="/img/home/img-banner.jpg" search={true}>
                <div>
                    <h1 className="font-bold">
                        BUSCAS TUS ENTRADAS PARA
                        <TextLoop>
                            <Link
                                href={route("movies")}
                                className="ml-1 text-emerald-400"
                                to="/"
                            >
                                PELÍCULAS
                            </Link>
                            <Link
                                href={route("sports")}
                                className="ml-1 text-emerald-400"
                                to="/"
                            >
                                DEPORTES
                            </Link>
                            <Link
                                href={route("events")}
                                className="ml-1 text-emerald-400"
                                to="/"
                            >
                                EVENTOS
                            </Link>
                        </TextLoop>
                    </h1>
                    <p className="mt-5 font-medium md:text-xl xl:text-2xl">
                        Emisión de boletos segura y confiable. ¡Su boleto para
                        entretenimiento en vivo!
                    </p>
                </div>
            </BannerSearch>

            <div className="py-section container">
                {filters.search && (
                    <div className="mb-8 text-xl">Resultados de busqueda para : " {filters.search} "</div>
                )}

                {items.data.length ? (
                    <>
                        <div className="grid grid-cols-1 gap-5 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-4">
                            {items.data.map((item, key) => (
                                <ItemCard key={key} item={item} />
                            ))}
                        </div>
                        <div className="mt-5">
                            <Pagination data={items} />
                        </div>
                    </>
                ) : (
                    <div className="text-center text-lg">
                        <span>No hay resutlados</span>
                    </div>
                )}
            </div>
        </Layout>
    );
};

export default EventSearch;
