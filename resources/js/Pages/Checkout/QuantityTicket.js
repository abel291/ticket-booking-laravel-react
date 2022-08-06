import Card from "@/Components/Card";
import SelectQuantity from "@/Components/SelectQuantity";
import Button from "@/Components/Button";
import React from "react";
import { formatCurrency } from "@/Helpers/Helpers";
import Select from "@/Components/Select";

const QuantityTicket = ({ data, setData }) => {

	const handleChange = (e) => {
		let id = e.target.name;
		let quantity_selected = parseInt(e.target.value);
		let new_tickets = [...data.tickets];

		let ticket_selected = new_tickets.find((i) => i.id == id)
		ticket_selected.quantity_selected = quantity_selected
		
		setData({
			...data,
			tickets: new_tickets
		});
	};

	return (
		<Card title="Tipos de entradas">
			<div >
				{data.tickets.map((item, key) => (
					<div
						key={item.id + data.date}
						className="flex justify-between items-center gap-x-8 border-b border-dark-blue-400 py-4"
					>
						<div className="w-full">

							<div className="textl-lg font-medium">
								{item.name}
							</div>
							<span className="text-base">
								{item.type == "free" ? "Gratis" : formatCurrency(item.price)}
							</span>

							<div className="mt-3">
								<p className="text-xs">{item.desc}</p>
							</div>
						</div>
						<div>
							<select
								value={item.quantity_selected || 0}
								onChange={handleChange}
								name={item.id}
								className="border border-dark-blue-400 bg-dark-blue-700"
							>
								<option className="bg-white" value="0">
									0
								</option>
								{[...Array(10).keys()].map((item) => (
									<option
										key={item.id + "-" + item}
										value={item + 1}
									>
										{item + 1}
									</option>
								))}
							</select>
						</div>
					</div>
				))}
			</div>
		</Card>
	);
};

export default QuantityTicket;
{
	/* <tr key={key}>
								<td className="py-3">
									<div>
										<div className="textl-lg font-medium">
											{item.name}
										</div>
										<p className="mt-2 text-xs">
											{item.desc}
										</p>
									</div>
								</td>
								<td className="py-3 px-4">
									<SelectQuantity />
								</td>
								<td className="py-3 px-4">
									<span className="block">{item.price}</span>
								</td>
							</tr> */
}
