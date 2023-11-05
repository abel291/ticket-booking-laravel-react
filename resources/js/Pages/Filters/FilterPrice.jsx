import Card from "@/Components/Card";
import Select from "@/Components/Select";
import CardFilter from "./CardFilter";

const FilterPrice = ({ data, setData }) => {

	const handleChange = (e) => {
		setData('price', e.target.value);
	};

	return (
		<CardFilter title="Precio" className="bg-primary-800">
			<Select value={data.price} className="text-sm w-full" name="price"
				handleChange={handleChange}>
				<option value="">Todos los precios</option>
				<option value="free">GRATUITO</option>
				<option value="0-20">$0 a $20</option>
				<option value="20-40">$20 a $40</option>
				<option value="40-60">$40 a $60</option>
				<option value="60-80">$60 a $80</option>
				<option value="80-100">$80 a $100</option>
				<option value="100++">mas de $100</option>
			</Select>
		</CardFilter>
	);
};

export default FilterPrice;
/**import FilterCheckbox from "@/Components/FilterCheckbox";
import { usePage } from "@inertiajs/react";
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

			items={categories}
			itemsChecked={categoriesChecked}
		/>
	);
};

export default FilterCategories;
 */
