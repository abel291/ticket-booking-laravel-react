import { Inertia } from "@inertiajs/inertia";
import { Link } from "@inertiajs/inertia-react";

import React from "react";

const FilterReset = () => {
    return (
        <div className="flex items-center justify-between py-5">
            <h5>Filtrar por:</h5>

            <Link
                className="text-sm text-emerald-400"
                href={location.pathname}
                preserveScroll
            >
                Limpiar todo
            </Link>
        </div>
    );
};

export default FilterReset;
