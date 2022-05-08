import React from "react";
import Select from "@/Components/Select";
import useFilters from "@/Hooks/useFilters";
import { usePage } from "@inertiajs/inertia-react";
const FilterOrder = () => {
    const { filters } = usePage().props;
    const { sendForm } = useFilters();

    const filterPerPage = filters?.perPage || 12;

    const handleChange = (e) => {
        let target = e.target;
        sendForm({ [target.name]: target.value });
    };

    return (
        <div className="rounded-lg border border-dark-blue-400 py-3 px-7 ">
            <div className="flex flex-wrap items-start justify-between gap-6">
                <div className="flex items-center gap-2 text-sm">
                    <span>Mostrar:</span>
                    <Select
                        name="perPage"
                        className="text-sm"
                        handleChange={handleChange}
                        value={filterPerPage}
                    >
                        <option value="12">12</option>
                        <option value="24">24</option>
                        <option value="32">32</option>
                    </Select>
                </div>
                {/* <div className="flex items-center gap-2 text-sm">
                    <span>Ordenar Por:</span>
                    <Select
                        name="order"
                        className="text-sm"
                        handleChange={handleChange}
                        value={filterOrder || 1}
                    >
                        <option value="recent">Recientes</option>                        
                        <option value="3">Mas Vendidos</option>
                        <option value="4">Mayoría de la vista</option>
                    </Select>
                </div> */}
            </div>
        </div>
    );
};

export default FilterOrder;
