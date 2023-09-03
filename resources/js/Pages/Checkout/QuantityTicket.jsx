import Card from "@/Components/Card";
import SelectQuantity from "@/Components/SelectQuantity";
import Button from "@/Components/Button";
import React from "react";
import { formatCurrency } from "@/Helpers/Helpers";
import Select from "@/Components/Select";

const QuantityTicket = ({ tickets, data, setData }) => {

    const handleChange = (e) => {
        let id = e.target.name;
        let quantity_selected = parseInt(e.target.value);

        let new_tickets_quantity = { ...data.tickets_quantity };

        if (quantity_selected > 0) {
            new_tickets_quantity[id] = quantity_selected;
        } else {
            delete new_tickets_quantity[id];
        }

        setData({
            ...data,
            tickets_quantity: new_tickets_quantity
        });
    };

    return (
        <Card title="Tipos de entradas">
            <div className="divide-y">
                {tickets.map((item, key) => (
                    <div
                        key={item.id + data.date}
                        className="flex justify-between items-start gap-x-8  py-3"
                    >
                        <div className="w-full">

                            <div className="textl-lg font-medium">
                                {item.name}
                            </div>
                            <span className="text-sm font-medium text-green-500">
                                {item.price == 0 ? "Gratis" : formatCurrency(item.price)}
                            </span>
                            {item.entry && (
                                <p className="mt-1.5 font-light text-sm ">{item.entry}</p>
                            )}
                        </div>
                        <div>
                            <select
                                value={data.tickets_quantity[item.id] || 0}
                                onChange={handleChange}
                                name={item.id}
                                className="select-form w-20"
                            >
                                <option value="0">
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
