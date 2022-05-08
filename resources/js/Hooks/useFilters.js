import { Inertia } from "@inertiajs/inertia";
import { usePage } from "@inertiajs/inertia-react";
import React, { useState, useEffect, useRef } from "react";

const useFilters = () => {
    const { filters } = usePage().props;
    const sendForm = (newFilters) => {
        let oldFilters = filters || {};
        Inertia.get(
            "/movies",
            { ...oldFilters, ...newFilters },
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
