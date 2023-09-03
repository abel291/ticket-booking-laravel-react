import FilterCheckbox from "@/Components/FilterCheckbox";
import { usePage } from "@inertiajs/react";
import React, { useState, useEffect } from "react";

const FilterCategories = ({ data, setData }) => {
	const { categories } = usePage().props; // all categories

	return (
		<FilterCheckbox
			title={'Categorias'}
			name="categories"
			itemValue="slug"
			itemTitle="name"
			items={categories}
			itemsChecked={data.categories} //categories Selected
			setData={setData}
		/>
	);
};

export default FilterCategories;
