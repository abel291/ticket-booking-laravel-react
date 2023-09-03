import ItemCard from "@/Components/ItemCard";
import Pagination from "@/Components/Pagination";
import Layout from "@/Layouts/Layout";
import { useRef, useEffect } from "react";
import FilterCategories from "./FilterCategories";
import FilterOrder from "./FilterOrder";
import FilterPrice from "./FilterPrice";
import FilterReset from "./FilterReset";
import FilterFormat from "./FilterFormat";
import ItemsLoading from "@/Components/ItemsLoading";
import { Link, useForm } from "@inertiajs/react";
import BannerHero from "@/Components/Hero/BannerHero";
import EventList from "./EventList";
import Spinner from "@/Components/Spinner";

const Filters = ({ events, filters }) => {

    const { data, setData, get, processing } = useForm({
        categories: filters.categories || [],
        formats: filters.formats || [],
        price: filters.price || "",
        search: filters.search || "",
        date: filters.date,
        perPage: filters.perPage || 12,
    });


    const initUpdate = useRef(true)
    useEffect(() => {

        if (initUpdate.current) {
            initUpdate.current = false
            return
        }
        get(route("events"),
            {
                preserveScroll: true,
                replace: true,
                //preserveState: true,
            }
        );
    }, [data])


    return (
        <Layout title="Eventos">
            <BannerHero title=" CONSIGUE TICKETS PARA TUS EVENTOS FAVORITOS"
                desc="Emisión de boletos segura y confiable. ¡Su boleto para entretenimiento en vivo!" img="/img/movies.jpg" />
            {/* <BannerHero
                img="/img/movies.jpg"
                title=" CONSIGUE TICKETS PARA TUS EVENTOS FAVORITOS"
                desc="Emisión de boletos segura y confiable. ¡Su boleto para entretenimiento en vivo!"
            /> */}

            <div className="py-section container ">
                <div className="grid grid-cols-1 gap-8 lg:grid-cols-10">
                    <div className="lg:col-span-3 xl:col-span-2">
                        <FilterReset processing={processing} />
                        <div className="">
                            <FilterCategories data={data} setData={setData} />
                            <FilterFormat data={data} setData={setData} />
                            <FilterPrice data={data} setData={setData} />
                        </div>
                    </div>
                    <div className="lg:col-span-7 xl:col-span-8">
                        <FilterOrder data={data} setData={setData} />
                        {events.data.length ? (
                            <div className="mt-6">
                                <EventList events={events.data} processing={processing} />
                                <div className="mt-6">
                                    <Pagination data={events} />
                                </div>
                            </div>
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
