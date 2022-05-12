import { Inertia } from "@inertiajs/inertia";
import { usePage } from "@inertiajs/inertia-react";
import React, { useState, useEffect, useRef } from "react";

const useFilters = () => {
    const filters = usePage().props.filters || {};
    const [loading, setLoading] = useState(false);
    const sendForm = (newFilters) => {
        Inertia.get(
            "/events",
            { ...filters, ...newFilters },
            {
                preserveScroll: true,
                replace: true,
                preserveState: true,
                onStart: () => {
                    setLoading(true);
                },
                onFinish: () => {
                    setLoading(false);
                },
            }
        );
    };

    return {
        loading,
        sendForm,
    };
};
export default useFilters;
