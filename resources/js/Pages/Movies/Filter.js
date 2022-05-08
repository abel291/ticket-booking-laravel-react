import { Link, useForm, usePage } from "@inertiajs/inertia-react";
import React, { useEffect, useState, useRef } from "react";
import Categories from "@/Components/Categories";
import Price from "@/Components/Price";
import { Inertia } from "@inertiajs/inertia";

const Filter = () => {
    return (
        <>
            <div className="flex items-center justify-between py-5">
                <h6>Filtrar por:</h6>
                <Link
                    preserveScroll
                    preserveState
                    href={route("movies")}
                    className="text-sm text-emerald-400"
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
