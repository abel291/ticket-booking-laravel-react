import React from "react";
import Card from "@/Components/Card";
import { FaCcPaypal, FaRegCreditCard } from "react-icons/fa";
import Input from "@/Components/Input";
import Button from "@/Components/Button";
import { Link } from "@inertiajs/inertia-react";
const PaymentOption = () => {
    return (
        <Card title="Opciones de Pago">
            <div className=" flex flex-wrap gap-4">
                <CardOptionPayment active="true">
                    <FaRegCreditCard className="h-auto w-4/5 text-blue-300" />
                    <span className=" mt-2 block text-xs font-light text-white">
                        Credito
                    </span>
                </CardOptionPayment>

                <CardOptionPayment>
                    <FaCcPaypal className="h-auto w-4/5 text-blue-300" />
                    <span className=" mt-2 block text-xs font-light text-white">
                        Paypal
                    </span>
                </CardOptionPayment>
            </div>
            <div className="mt-10">
                <div className="space-y-5">
                    <div className="text-lg font-medium">
                        Ingrese los Detalles de su Tarjeta{" "}
                    </div>
                    <div className=" space-y-4">
                        <div>
                            <label className="block font-light" htmlFor="name">
                                Nombre del titular
                            </label>
                            <input
                                type="text"
                                name="name"
                                className="mt-1 w-full rounded-md border border-dark-blue-400 bg-transparent py-2 text-sm ring-0 placeholder:text-blue-300  focus:border-white focus:ring-0 md:w-1/2 "
                                required={true}
                            />
                        </div>
                        <div>
                            <label className="block font-light" htmlFor="card">
                                Numero de targeta
                            </label>
                            <input
                                type="text"
                                name="card"
                                className={`mt-1 w-full rounded-md border border-dark-blue-400  bg-transparent py-2 text-sm ring-0  placeholder:text-blue-300 focus:border-white focus:ring-0 `}
                                required={true}
                            />
                        </div>
                    </div>
                    <div>
                        <Button>Realizar pago</Button>
                        <span className="mt-4 block text-sm font-light">
                            Al hacer clic en 'Realizar pago', acepta los{" "}
                            <Link className="text-blue-300 hover:text-emerald-400">
                                Términos y condiciones
                            </Link>
                        </span>
                    </div>
                </div>
            </div>
        </Card>
    );
};

const CardOptionPayment = ({ children, active = false }) => {
    return (
        <div
            className={
                "flex w-24 flex-col items-center justify-center rounded-xl border-2 border-dark-blue-400 py-3 px-2 " +
                (active ? "border-emerald-400" : "border-dark-blue-400")
            }
        >
            {children}
        </div>
    );
};

export default PaymentOption;
