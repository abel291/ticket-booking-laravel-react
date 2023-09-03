import FilterCheckbox from "@/Components/FilterCheckbox";
import { usePage } from "@inertiajs/react";
import React, { useState, useEffect } from "react";

const FilterFormat = ({ data, setData }) => {
	const { formats } = usePage().props; // all format

	return (
		<FilterCheckbox
			title="Formatos"
			name="formats"
			itemValue="slug"
			itemTitle="name"
			items={formats}
			itemsChecked={data.formats}//formats Selected
			setData={setData}
		/>
	);
};

export default FilterFormat;
