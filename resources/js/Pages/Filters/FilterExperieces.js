import FilterCheckbox from "@/Components/FilterCheckbox";
import { usePage } from "@inertiajs/inertia-react";
import React, { useState, useEffect } from "react";

const FilterExperieces = ({ title = "Categorias" }) => {
    const { filters } = usePage().props; // all categories

    const experiencesChecked = filters?.experiences || [];
    const data = [
        {
            title: "2D",
            value: "2D",
        },
        {
            title: "3D",
            value: "3D",
        },
    ];

    return (
        <FilterCheckbox
            title={'Experiencias'}
            name="experiences"
            items={data}
            itemsChecked={experiencesChecked}
        />
    );
};

export default FilterExperieces;
