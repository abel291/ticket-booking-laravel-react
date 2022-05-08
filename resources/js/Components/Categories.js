import useFilters from "@/Hooks/useFilters";
import { usePage } from "@inertiajs/inertia-react";
import React, { useState, useEffect } from "react";
import Card from "./Card";

const Categories = () => {
    const { categories, filters } = usePage().props; // all categories

    const filterCategories = filters?.categories || [];

    const { sendForm } = useFilters();

    //quitar - agregar categorias
    const handleChange = (e) => {
        let target = e.target;
        let newCategoriesChecked = filterCategories;

        if (target.checked) {
            newCategoriesChecked.push(target.value);
        } else {
            newCategoriesChecked = newCategoriesChecked.filter(
                (item) => item !== target.value
            );
        }
        sendForm({ categories: newCategoriesChecked });
    };

    return (
        <Card title="Categorias">
            <div className="space-y-3">
                {categories.data.map((item, key) => (
                    <div className="flex items-center gap-2" key={key}>
                        <input
                            checked={filterCategories.includes(item.slug)}
                            type="checkbox"
                            className="border border-white bg-transparent"
                            value={item.slug}
                            name="categories"
                            onChange={handleChange}
                        />
                        <label htmlFor="" className="text-sm font-light">
                            {item.name}
                        </label>
                    </div>
                ))}
            </div>
        </Card>
    );
};

export default Categories;
