import React from "react";
import Select from "@/Components/Select";
const Order = () => {
    return (
        <div className="rounded-lg border border-dark-blue-400 py-3 px-7 ">
            <div className="flex flex-wrap gap-6 items-start justify-between">
                <div className="flex items-center gap-2 text-sm">
                    <span>Mostrar:</span>
                    <Select className="text-sm">
                        <option value="">12</option>
                        <option value="">24</option>
                        <option value="">32</option>
                    </Select>
                </div>
                <div className="flex items-center gap-2 text-sm">
                    <span>Ordenar Por:</span>
                    <Select className="text-sm">
                        <option value="">Recientes</option>
                        <option value="">Exclusivo</option>
                        <option value="">Tendencias</option>
                        <option value="">Mayoría de la vista</option>
                    </Select>
                </div>
            </div>
        </div>
    );
};

export default Order;
