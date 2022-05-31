import Card from "@/Components/Card";
import React from "react";
import Select from "@/Components/Select";
import { formatDate } from "@/Helpers/Helpers";
import { usePage } from "@inertiajs/inertia-react";
const SelectDate = ({ sessions, data, setData }) => {

    const handleChangeSession = (e) => {
        setData('date', e.target.value)
        setData('tickets_quantity', {})
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
