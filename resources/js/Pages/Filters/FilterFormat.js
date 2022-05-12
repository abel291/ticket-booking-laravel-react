import FilterCheckbox from "@/Components/FilterCheckbox";
import { usePage } from "@inertiajs/inertia-react";
import React, { useState, useEffect } from "react";

const FilterFormat = () => {
    const { formats, filters } = usePage().props; // all format

    const formatsChecked = filters?.formats || [];

    return (
        <FilterCheckbox
            title="Formatos"
            name="formats"
            itemValue="slug"
            itemTitle="name"
            items={formats.data}
            itemsChecked={formatsChecked}
        />
    );
};

export default FilterFormat;
