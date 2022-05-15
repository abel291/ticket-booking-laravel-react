import Button from "@/Components/Button";
import Input from "@/Components/Input";
import Select from "@/Components/Select";
import { FaFutbol, FaFilm, FaStar } from "react-icons/fa";
import React from "react";
import "flatpickr/dist/themes/material_green.css";
import Flatpickr from "react-flatpickr";
import { Spanish } from "flatpickr/dist/l10n/es.js";
import { useForm, usePage } from "@inertiajs/inertia-react";
import { Inertia } from "@inertiajs/inertia";
const Search = () => {
    const { filters, categories } = usePage().props;

    const { data, setData, get, processing, errors } = useForm({
        date: filters?.date || "",
        category: filters?.category || "",
        search: filters?.search || "",
    });

    const handleChange = (e) => {
        setData({ ...data, [e.target.name]: e.target.value });
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        get(route("events"), data, {
            preserveState: true,
            preserveScroll: false,
        });
    };

    return (
        <div className="container ">
            <div className="bg-gradient-invert relative mt-4 rounded py-8 px-4  lg:py-10 lg:px-7">
                <div className="items-center justify-between px-3 md:flex lg:px-0">
                    <div>
                        <p className="font-medium uppercase text-emerald-400 md:text-lg">
                            BIENVENIDOS A{" "}
                            <span className="font-bold capitalize">
                                MyTicket
                            </span>
                        </p>
                        <h3 className="mt-2  font-bold uppercase md:mt-2">
                            QUÉ ESTÁS BUSCANDO
                        </h3>
                    </div>
                    <div className="mt-5 hidden gap-6 sm:flex">
                        <span className="flex items-center gap-1 font-semibold">
                            <FaFilm className="h-5 w-5" />
                            <span>Peliculas</span>
                        </span>
                        <span className="flex items-center gap-1 font-semibold">
                            <FaStar className="h-5 w-5" />
                            <span>Eventos</span>
                        </span>
                        <span className="flex items-center gap-1 font-semibold">
                            <FaFutbol className="h-5 w-5" />
                            <span>Deportes</span>
                        </span>
                    </div>
                </div>
                <div className="mt-6 md:mt-12">
                    <div className="before:bg-black-300 relative p-4 before:absolute before:inset-0 before:bg-black before:opacity-30 before:content-[''] lg:p-7">
                        <form onSubmit={handleSubmit}>
                            <div className="relative flex flex-col items-stretch justify-between gap-5 lg:grid-cols-12 lg:flex-row lg:items-center ">
                                <div className="w-full lg:grow">
                                    <Input
                                        required={true}
                                        className="w-full"
                                        placeholder="Busca tu evento"
                                        name="search"
                                        value={data.search}
                                        handleChange={handleChange}
                                    />
                                </div>
                                <Flatpickr
                                    placeholder="Fecha"
                                    required={true}
                                    className="w-36 border-r-0 border-l-0 border-t-0 border-b border-white border-opacity-70 bg-inherit ring-0 focus:border-emerald-500 focus:ring-0"
                                    name="search"
                                    options={{
                                        locale: Spanish,
                                    }}
                                    value={data.date}
                                    onChange={(date) => {
                                        let newDate = date.length
                                            ? date[0].toISOString().slice(0, 10)
                                            : null;
                                        setData({
                                            ...data,
                                            date: newDate,
                                        });
                                    }}
                                />

                                <Select
                                    required={true}
                                    className="w-full lg:w-auto"
                                    name="category"
                                    value={data.type}
                                    handleChange={handleChange}
                                >
                                    <option className="text-black" value="all">
                                        Todas las categorias
                                    </option>
                                    {categories.data.map((item) => (
                                        <option
                                            key={item.slug}
                                            value={item.slug}
                                        >
                                            {item.name}
                                        </option>
                                    ))}
                                </Select>

                                <Button>Buscar</Button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default Search;
