import Card from "@/Components/Card";
import React from "react";
import Select from "@/Components/Select";
import { formatDate } from "@/Helpers/Helpers";
import { usePage } from "@inertiajs/inertia-react";
const SelectDate = ({ sessions, session_selected, handleChange }) => {   
    

    return (
        <Card title="Seleccione La Fecha">
            <Select
                handleChange={handleChange}
                className="capitalize"
                value={session_selected}
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
