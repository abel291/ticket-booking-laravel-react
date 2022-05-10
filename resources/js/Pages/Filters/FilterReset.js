import { Inertia } from "@inertiajs/inertia";
import { Link } from "@inertiajs/inertia-react";

import React from "react";

const FilterReset = () => {
    return (
        <div className="flex items-center justify-between py-5">
            <h6>Filtrar por:</h6>

            <Link
                className="text-sm text-emerald-400"
                href={location.pathname}
                preserveState
                preserveScroll
            >
                Limpiar todo
            </Link>
        </div>
    );
};

export default FilterReset;
