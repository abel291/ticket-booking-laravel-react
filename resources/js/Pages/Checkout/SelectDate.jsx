import Card from "@/Components/Card";
import React from "react";
import Select from "@/Components/Select";
import { formatDate, formatDateTime } from "@/Helpers/Helpers";
import { usePage } from "@inertiajs/react";
const SelectDate = ({ sessions, data, setData }) => {

    const handleChangeSession = (e) => {
        setData({
            ...data,
            date: e.target.value,
            tickets_quantity: {}
        })
    };
    return (
        <Card title="Seleccione la fecha">

            <div className="inline-block">
                <Select
                    handleChange={handleChangeSession}
                    className="w-auto"
                    value={data.date}
                >
                    {sessions.map((item, key) => (
                        <option key={key} value={item.date}>
                            {item.dateFormat}
                        </option>
                    ))}
                </Select>
            </div >

        </Card >
    );
};

export default SelectDate;
