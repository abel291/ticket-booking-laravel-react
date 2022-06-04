import ItemCard from "@/Components/ItemCard";
import Pagination from "@/Components/Pagination";
import Layout from "@/Layouts/Layout";
import { useRef, useEffect } from "react";
import FilterCategories from "./FilterCategories";
import FilterOrder from "./FilterOrder";
import FilterPrice from "./FilterPrice";
import FilterReset from "./FilterReset";
import FilterFormat from "./FilterFormat";
import ItemsLoading from "./ItemsLoading";
import { Inertia } from "@inertiajs/inertia";
import { useForm } from "@inertiajs/inertia-react";

const Filters = ({ events, filters }) => {

    const { data, setData, get, processing } = useForm({
        categories: filters.categories || [],
        formats: filters.formats || [],
        price: filters.price || "",
        search: filters.search || "",
        date: filters.date,
        perPage: filters.perPage || null,
    });
    console.log(data)

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
                        <div className="space-y-8 ">
                            <FilterCategories data={data} setData={setData} />
                            <FilterFormat data={data} setData={setData} />
                            <FilterPrice data={data} setData={setData} />
                        </div>
                    </div>
                    <div className="lg:col-span-7 xl:col-span-8">
                        <FilterOrder data={data} setData={setData} />
                        {events.data.length ? (
                            <ItemsLoading loading={processing}>
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
                            </ItemsLoading>
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
