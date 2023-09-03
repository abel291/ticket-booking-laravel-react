
import Spinner from "@/Components/Spinner";
import { Link } from "@inertiajs/react";

import React from "react";

const FilterReset = ({ processing }) => {
    return (
        <div className="flex items-center justify-between pb-6 mt-1.5">
            <div className="flex items-center">
                <h5 className="text-base font-medium inline-block">
                    Filtros

                </h5>
                {processing && (
                    <Spinner className="inline-block w-4 h-4 ml-3" />
                )}
            </div>

            <Link
                className="text-xs font-light"
                href={location.pathname}
                preserveScroll
            >
                Limpiar todo
            </Link>
        </div>
    );
};

export default FilterReset;
