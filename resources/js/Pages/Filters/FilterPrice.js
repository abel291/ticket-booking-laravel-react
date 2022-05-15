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
        <Card title="Precio" className="bg-dark-blue-800">
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
/**import FilterCheckbox from "@/Components/FilterCheckbox";
import { usePage } from "@inertiajs/inertia-react";
import React, { useState, useEffect } from "react";

const FilterCategories = ({ title = "Categorias" }) => {
    const { categories, filters } = usePage().props; // all categories

    const categoriesChecked = filters?.categories || [];
    const prices = [
        { title: "$0 de $20", value: "0-20" },
        { title: "$20 de $40", value: "20-40" },
        { title: "$40 de $60", value: "40-60" },
        { title: "$60 de $80", value: "60-80" },
        { title: "$80 de $100", value: "80-100" },
        { title: "mas de $100", value: "100++" },
    ];
    return (
        <FilterCheckbox
            title={"Precios"}
            name="prices"
            
            items={categories.data}
            itemsChecked={categoriesChecked}
        />
    );
};

export default FilterCategories;
 */
