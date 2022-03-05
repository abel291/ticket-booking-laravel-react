import Card from "@/Components/Card";
import SelectQuantity from "@/Components/SelectQuantity";
import React from "react";

const QuantityTicket = () => {
    return (
        <Card title="Consigue tus entradas">
            <div className="border-t border-dashed border-dark-blue-400 pt-7">
                <div className="flex items-center gap-4">
                    <span>Numero de asientos :</span>
                    <SelectQuantity />
                </div>
            </div>
        </Card>
    );
};

export default QuantityTicket;
