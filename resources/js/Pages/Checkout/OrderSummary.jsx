import Badge from "@/Components/Badge";
import Spinner from "@/Components/Spinner";
import { formatCurrency, formatDate, formatDateTime } from "@/Helpers/Helpers";
import { CalendarDaysIcon, MapPinIcon, XMarkIcon } from "@heroicons/react/24/outline";
import { Link, usePage } from "@inertiajs/react";

import React, { useState, useEffect } from "react";

const OrderSummary = ({ loading, data, setData, event, order }) => {

    const { tickets_selected, session_selected } = usePage().props
    return (

        <div className="flex h-full flex-col overflow-hidden rounded-lg bg-white border ">
            <div className="relative overflow-hidden">
                <img src={event.thum} alt={event.title} />
            </div>
            <div className="p-6  bg-gray-100">
                <div className="flex gap-x-3">
                    <div>
                        <MapPinIcon className="w-6 h-6" />
                    </div>
                    <span className="text-sm text-gray-700">{event.location.address}</span>
                </div>
                <div className="flex gap-x-3 mt-4">
                    <div>
                        <CalendarDaysIcon className="w-6 h-6" />
                    </div>
                    <span className="text-sm text-gray-700">{event.title}</span>
                </div>
            </div>
            <div className="divide-dashed divide-y p-8">

                <div className="pb-3 flex justify-between items-center gap-x-3">
                    <h6 className="font-semibold">Resumen del pedido</h6>
                    {loading && <Spinner className="w-5 h-5" />}
                </div>
                <div>
                    <div className="py-3 ">
                        <Tilte>Evento</Tilte>
                        <SubTitle className="mt-1">{event.title}</SubTitle>
                    </div>

                    <div className="py-3 ">
                        <Tilte>Fecha</Tilte>
                        <SubTitle className="mt-1">
                            {session_selected.dateFormat}
                        </SubTitle>
                    </div>
                </div>

                {tickets_selected.length != 0 && (
                    <div className="py-3">
                        <Tilte>Boletos</Tilte>
                        {tickets_selected.map((item, key) => (
                            <SubTitle className="mt-2" key={item.name}>

                                <div className="flex justify-between gap-3">
                                    <div>
                                        {item.quantity_selected} x {item.name}
                                    </div>
                                    <div>{formatCurrency(item.price_quantity)}</div>
                                </div>
                            </SubTitle>
                        ))}
                    </div>
                )}

                <div className=" relative py-3 ">
                    <SubTitle>
                        <div className="space-y-3">
                            <div className="flex justify-between gap-3">
                                <div>Sub total</div>
                                <div>{formatCurrency(order.sub_total)}</div>
                            </div>
                            {order.promotion && (
                                <div className="flex items-center justify-between gap-x-2 ">
                                    <button onClick={(e) => { setData({ ...data, code_promotion: null }) }} ><XMarkIcon className="w-4 h-4" /></button>
                                    <div className="grow ">
                                        Descuento
                                        {order.promotion.type == "percent" && (
                                            <span className=" ml-1">({order.promotion.value}%)</span>
                                        )}
                                        <Badge className='tracking-wider ml-2 ' >{order.promotion.code}</Badge>
                                    </div>
                                    <div className="text-green-500" >-{formatCurrency(order.promotion.applied)}</div>
                                </div>
                            )}
                            <div className="flex justify-between gap-3">
                                <div>Gastos de gestión {order.fee_porcent * 100}%</div>
                                <div>{formatCurrency(order.fee)}</div>
                            </div>

                        </div>
                    </SubTitle>


                </div>
                <div className="text-base font-medium py-3">
                    <div className="mt-1 flex justify-between gap-3">
                        <div>Monto a Pagar</div>
                        <div>{formatCurrency(order.total)}</div>
                    </div>
                </div>
                <div className="pt-3">
                    <p className="text-sm text-gray-400 ">Los precios incluyen los impuestos. La disponibilidad de las entradas podría variar durante el proceso de compra.</p>
                </div>
                {/* <div>
                    <form onSubmit={handleSubmit}>
                        <Button className="w-full btn btn-primary relative disabled:opacity-50"
                            disabled={Object.keys(data.tickets_quantity).length === 0}
                            processing={loading}
                        >Proceder al Pago</Button>
                    </form>

                </div> */}

            </div>
        </div>

    );
};

const Tilte = ({ children }) => {
    return (
        <div className="text-sm font-semibold  ">
            {children}
        </div>
    );
};

const SubTitle = ({ className, children }) => {
    return (
        <span className={"block text-sm text-gray-600  " + className}>
            {children}
        </span>
    );
};

export default OrderSummary;
