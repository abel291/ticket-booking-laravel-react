import FilterCheckbox from "@/Components/FilterCheckbox";
import { usePage } from "@inertiajs/inertia-react";
import React, { useState, useEffect } from "react";

const FilterCategories = ({ title = "Categorias" }) => {
    const { categories, filters } = usePage().props; // all categories

    const categoriesChecked = filters?.categories || [];

    return (
        <FilterCheckbox
            title={title}
            name="categories"
            itemValue="slug"
            itemTitle="name"
            items={categories.data}
            itemsChecked={categoriesChecked}
        />
    );
};

export default FilterCategories;
