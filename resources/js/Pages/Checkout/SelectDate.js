import Card from "@/Components/Card";
import React from "react";
import Select from "@/Components/Select";
import { formatDate } from "@/Helpers/Helpers";
import { usePage } from "@inertiajs/inertia-react";
const SelectDate = ({ data, setData }) => {

	const handleChangeSession = (e) => {

		let target = e.target
		let session_selected = data.sessions.find((i) => i.date == target.value)

		setData({
			...data,
			session_selected: session_selected.date,
			tickets: session_selected.tickets_available
		})
	};
	return (
		<Card title="Seleccione La Fecha">
			<Select
				handleChange={handleChangeSession}
				className="capitalize"
				value={data.session_selected}
			>
				{data.sessions.map((item, key) => (
					<option key={key} value={item.date}>
						{formatDate(item.date)}
					</option>
				))}
			</Select>
		</Card>
	);
};

export default SelectDate;
