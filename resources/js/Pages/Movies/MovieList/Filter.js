import { Link } from "@inertiajs/inertia-react";
import React from "react";
import Categories from "@/Components/Categories";
import Price from "@/Components/Price";

const Filter = () => {
    return (
        <>
            <div className="flex items-center justify-between py-5">
                <h6>Filtrar por:</h6>
                <Link
                    className="text-sm text-emerald-400"
                    href={route("movies")}
                >
                    Limpiar todo
                </Link>
            </div>
            <div className=" space-y-6 ">
                <Categories />
                <Price />
            </div>
        </>
    );
};

export default Filter;
