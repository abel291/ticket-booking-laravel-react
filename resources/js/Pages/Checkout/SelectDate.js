import Card from "@/Components/Card";
import React from "react";
import Select from "@/Components/Select";
import { formatDate } from "@/Helpers/Helpers";
import { usePage } from "@inertiajs/inertia-react";
const SelectDate = ({ sessions, data, setData }) => {

	const handleChangeSession = (e) => {
		let session_selected = sessions.find((i) => i.date == e.target.value)

		let tickets = session_selected.tickets.map((item) => {
			item.quantity_selected = 0;
			return item
		})
		setData({
			...data,
			date: session_selected.date,
			tickets: tickets
		})
	};
	return (
		<Card title="Seleccione La Fecha">
			<Select
				handleChange={handleChangeSession}
				className="capitalize"
				value={data.date}
			>
				{sessions.map((item, key) => (
					<option key={key} value={item.date}>
						{formatDate(item.date)}
					</option>
				))}
			</Select>
		</Card>
	);
};

export default SelectDate;
