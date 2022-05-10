import { Inertia } from "@inertiajs/inertia";
import { usePage } from "@inertiajs/inertia-react";
import React, { useState, useEffect, useRef } from "react";

const useFilters = () => {
    const filters = usePage().props.filters || {};

    // useEffect(() => {
    //     setfilters(data.filters || {});
    // }, [data.filters]);

    const sendForm = (newFilters) => {
        Inertia.get(
            "/movies",
            { ...filters, ...newFilters },
            {
                preserveScroll: true,
                replace: true,
                preserveState: true,
            }
        );
    };

    return {
        //filters,
        sendForm,
    };
};
export default useFilters;
