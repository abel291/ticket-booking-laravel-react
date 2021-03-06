import Button from "@/Components/Button";
import Input from "@/Components/Input";
import { formatCurrency } from "@/Helpers/Helpers";
import { useForm } from "@inertiajs/inertia-react";
import React from "react";

import MyAccount from "./MyAccount";

const CancelOrder = ({ payment, days, porcent_refund, amount_refund }) => {
    const { data, processing, post } = useForm({
        code: payment.code,
    });
    const handleSubmit = (e) => {
        e.preventDefault();
        post(route("profile.store_cancel_order"));
    };
    return (
        <MyAccount title={"Cancelacion de orden"}>
            <div className="flex gap-6">
                <div className="w-full md:w-1/2">
                    <table className="w-full">
                        <tbody className="divide-y divide-dark-blue-400">
                            <tr>
                                <td className="p-3">Dias faltante al evento</td>
                                <td className="p-3">{days} </td>
                            </tr>
                            <tr>
                                <td className="p-3">Monto Pagado</td>
                                <td className="p-3">
                                    {formatCurrency(payment.total)}
                                </td>
                            </tr>
                            <tr>
                                <td className="p-3 ">
                                    Tarifa {payment.fee_porcent}
                                </td>
                                <td className="p-3">
                                    {formatCurrency(payment.fee)}
                                </td>
                            </tr>
                            <tr>
                                <td className="p-3">Valor a devolder</td>
                                <td className="p-3">
                                    {formatCurrency(amount_refund)}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div className="w-full md:w-1/2">
                    <h3 className="text-lg font-medium">
                        Politicas de cancelacion
                    </h3>
                    <div className="mt-4 space-y-5 text-sm leading-loose">
                        <p>
                            Cancelaciones 15 d??as naturales previos al evento se
                            reembolsar?? el 100% del importe de inscripci??n,
                            excepto los gastos de gesti??n que pudiera ocasionar.
                        </p>

                        <p>
                            Cancelaciones entre 15 y 3 d??as naturales previos al
                            evento se reembolsar?? el 50% del importe de
                            inscripci??n, excepto los gastos de gesti??n que
                            pudiera ocasionar.
                        </p>

                        <p>
                            Cancelaciones con menos de 3 d??as naturales de
                            anticipaci??n no dar?? derecho a devoluci??n alguna.
                        </p>
                    </div>
                </div>
            </div>
            <div>
                <form onSubmit={handleSubmit}>
                    <Button processing={processing} className="bg-red-500">
                        Cancelar Compra
                    </Button>
                </form>
            </div>
        </MyAccount>
    );
};

export default CancelOrder;
