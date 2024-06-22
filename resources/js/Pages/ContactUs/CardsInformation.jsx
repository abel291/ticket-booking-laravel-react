import Card from "@/Components/Card";
import ListDescription from "@/Components/ListDescription";
import React from "react";

const CardsInformation = () => {
    return (
        <dl className="grid gap-10 lg:grid-cols-3">
            <Card title="Información de entradas">
                <div className="space-y-2">
                    <ListDescription title="Nombre">
                        Mr. Rocky Donnelly
                    </ListDescription>
                    <ListDescription title="Telefono">
                        +1.815.936.2784
                    </ListDescription>
                    <ListDescription title="Email">
                        info@example.com
                    </ListDescription>
                </div>
            </Card>
            <Card title="Información de asociaciones">
                <div className="space-y-2">
                    <ListDescription title="Nombre">
                        Mr. Rocky Donnelly
                    </ListDescription>
                    <ListDescription title="Telefono">
                        +1.815.936.2784
                    </ListDescription>
                    <ListDescription title="Email">
                        info@example.com
                    </ListDescription>
                </div>
            </Card>
            <Card title="Detalles del programa">
                <div className="space-y-2">
                    <ListDescription title="Nombre">
                        Mr. Rocky Donnelly
                    </ListDescription>
                    <ListDescription title="Telefono">
                        +1.815.936.2784
                    </ListDescription>
                    <ListDescription title="Email">
                        info@example.com
                    </ListDescription>
                </div>
            </Card>
        </dl>
    );
};

export default CardsInformation;
