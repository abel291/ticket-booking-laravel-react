
import SelectQuantity from "@/Components/SelectQuantity";
import React from "react";

const OrderSummary = () => {
    return (
        <div className="divide-y divide-dashed divide-dark-blue-400 rounded border border-dark-blue-500 bg-dark-blue-700 p-7">
            <div className="pb-6 text-center">
                <h5 className="font-medium uppercase">Resumen de pedido</h5>
            </div>
            <div className=" space-y-4 py-6 ">
                <div>
                    <Tilte>LA FAMILIA MITCHELL VS. LAS MÁQUINAS</Tilte>

                    <SubTitle className="mt-2">Esp - Sala 1</SubTitle>
                </div>

                <div>
                    <Tilte>
                        <div className="flex justify-between">
                            <div>GENESIS CINEMA</div>
                            <div className="ml-3">02</div>
                        </div>
                    </Tilte>

                    <SubTitle className="mt-2">10 SEP TUE, 11:00 PM</SubTitle>
                </div>

                <div>
                    <Tilte>
                        <div className="flex justify-between">
                            <div>Precio del Ticket</div>
                            <div className="ml-3">$12.00</div>
                        </div>
                    </Tilte>
                    
                </div>
            </div>

            <div className="ticket-border-rounded relative py-6">
                <div>
                    <Tilte>
                        <div className="flex justify-between">
                            <div>ALIMENTOS Y BEBIDAS</div>
                            <div className="ml-3">$12.55</div>
                        </div>
                    </Tilte>

                    <SubTitle className="mt-2">2 Pizza Combo</SubTitle>
                </div>
            </div>
            <div className="space-y-4 pt-6 ">
                <SubTitle>
                    <div className="flex justify-between">
                        <div>Precio</div>
                        <div className="ml-3">$120.00</div>
                    </div>
                    <div className="mt-1 flex justify-between">
                        <div>IVA</div>
                        <div className="ml-3">$15.00</div>
                    </div>
                </SubTitle>
                <Tilte>
                    <div className="mt-1 flex justify-between">
                        <div>Monto a Pagar</div>
                        <div className="ml-3">$120.00</div>
                    </div>
                </Tilte>
            </div>
        </div>
    );
};

const Tilte = ({ children }) => {
    return (
        <div className="text-lg font-medium uppercase text-white">
            {children}
        </div>
    );
};

const SubTitle = ({ className, children }) => {
    return (
        <span className={"block text-sm uppercase text-blue-300 " + className}>
            {children}
        </span>
    );
};

export default OrderSummary;
