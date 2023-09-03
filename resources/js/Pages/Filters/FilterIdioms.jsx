import FilterCheckbox from "@/Components/FilterCheckbox";
import { usePage } from "@inertiajs/react";
import React, { useState, useEffect } from "react";

const FilterIdioms = () => {
	const { filters } = usePage().props; // all categories

	const IdiomsChecked = filters?.experiences || [];
	const data = [
		{
			title: "Español",
			value: "spanish",
		},
		{
			title: "Ingles",
			value: "english",
		},
		{
			title: "Español Subtitulado",
			value: "subtitled",
		},
	];

	return (
		<FilterCheckbox
			title="Idiomas"
			name="idioms"
			items={data}
			itemsChecked={IdiomsChecked}
		/>
	);
};

export default FilterIdioms;
