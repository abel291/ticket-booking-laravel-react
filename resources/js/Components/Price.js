import Button from "@/Components/Button";
import Input from "@/Components/Input";
import React from "react";
import Card from "./Card";

const Price = () => {
    return (
        <Card title="Precio">
            <div className="flex gap-4">
                <Input placeholder="Minimo" type="number" className="w-full" />

                <Input placeholder="Maximo" type="number" className="w-full" />
            </div>
            <Button className="mt-4">Buscar</Button>
        </Card>
    );
};

export default Price;
