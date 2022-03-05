import Button from "@/Components/Button";
import Input from "@/Components/Input";
import Select from "@/Components/Select";
import { FaFutbol, FaFilm, FaStar } from "react-icons/fa";
import React from "react";
import { FilmIcon, StarIcon } from "@heroicons/react/solid";

const Search = () => {
    return (
        <div className="container ">
            <div className="bg-gradient-invert relative mt-4 rounded py-8 px-4  lg:py-10 lg:px-7">
                <div className="items-center justify-between px-3 md:flex lg:px-0">
                    <div>
                        <p className="font-medium uppercase text-emerald-400 md:text-lg">
                            BIENVENIDOS A BOLETO
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
                <form className="mt-6 md:mt-12">
                    <div className="before:bg-black-300 relative p-4 before:absolute before:inset-0 before:bg-black before:opacity-30 before:content-[''] lg:p-7">
                        <form>
                            <div className="relative flex flex-col items-stretch justify-between gap-5 lg:grid-cols-12 lg:flex-row lg:items-center ">
                                <div className="w-full lg:grow">
                                    <Input
                                        className="w-full"
                                        placeholder="Busca tu evento"
                                    />
                                </div>

                                <Select
                                    className="w-full lg:w-auto"
                                    name="pen"
                                    id=""
                                >
                                    <option>Tipe de evento</option>
                                    <option
                                        className="text-black"
                                        value="movies"
                                    >
                                        Peliculas
                                    </option>
                                    <option
                                        className="text-black"
                                        value="events"
                                    >
                                        Eventos
                                    </option>
                                    <option
                                        className="text-black"
                                        value="sport"
                                    >
                                        Deportes
                                    </option>
                                </Select>

                                <Select
                                    className="w-full lg:w-auto"
                                    name=""
                                    id=""
                                >
                                    <option>Fecha</option>
                                    <option
                                        className="text-black"
                                        value="d"
                                    ></option>
                                </Select>

                                <Button>Buscar</Button>
                            </div>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    );
};

export default Search;
