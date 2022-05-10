import Button from "@/Components/Button";
import Card from "@/Components/Card";
import Input from "@/Components/Input";
import useFilters from "@/Hooks/useFilters";
import { usePage } from "@inertiajs/inertia-react";
import React, { useRef, useEffect, useState } from "react";


const FilterPrice = () => {
    const { filters } = usePage().props;
    const { sendForm } = useFilters();
    const priceMinReF = useRef();
    const priceMaxReF = useRef();

    useEffect(() => {
        priceMinReF.current.value = filters?.price_min || "";
        priceMaxReF.current.value = filters?.price_max || "";
    }, []);

    const handleSubmit = (e) => {
        e.preventDefault();
        // setFilters({
        //     ...filters,
        //     price_min: priceMinReF.current.value,
        //     price_max: priceMaxReF.current.value,
        // });
        
        sendForm({
            price_min: priceMinReF.current.value,
            price_max: priceMaxReF.current.value,
        });
    };

    return (
        <Card title="Precio">
            <form onSubmit={handleSubmit}>
                <div className="gap-4">
                    <input
                        ref={priceMinReF}
                        name="price_min"
                        placeholder="Minimo"
                        type="number"
                        className="input w-full text-sm"
                    />

                    <input
                        ref={priceMaxReF}
                        name="price_max"
                        placeholder="Maximo"
                        type="number"
                        className="input mt-2 w-full text-sm"
                    />
                </div>
                <button className="btn relative mt-4 text-sm disabled:opacity-50">
                    Buscar
                </button>
            </form>
        </Card>
    );
};

export default FilterPrice;
