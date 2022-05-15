import { Inertia } from "@inertiajs/inertia";
import { usePage } from "@inertiajs/inertia-react";
import React, { useState, useEffect, useRef } from "react";

const useFilters = () => {
    const filters = usePage().props.filters || {};

    const sendForm = (newFilters) => {
        Inertia.get(
            "/events",
            { ...filters, ...newFilters },
            {
                preserveScroll: true,
                replace: true,
                preserveState: true,
            }
        );
    };

    return {
        sendForm,
    };
};
export default useFilters;
