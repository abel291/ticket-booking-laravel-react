import React, { useEffect, useState, useRef } from "react";
import Card from "@/Components/Card";
import Button from "@/Components/Button";
import { Link, router, useForm, usePage } from "@inertiajs/react";
import ValidationErrors from '@/Components/ValidationErrors';
import { CardElement, Elements, useElements, useStripe } from "@stripe/react-stripe-js";
import Label from "@/Components/Label";


const PaymentOption = ({ data }) => {

    const { errors, order } = usePage().props
    const [errorStripe, setErrorStripe] = useState();
    const [paymentMethod, setPaymentMethod] = useState();

    const [loading, setLoading] = useState(false);
    const nameCreditCard = useRef();
    const stripe = useStripe();
    const elements = useElements();

    const handleSubmit = async (e) => {
        e.preventDefault();
        setErrorStripe("");
        setLoading(true);

        //tickets gratuitos
        if (order.total == 0 && Object.keys(data.tickets_quantity).length > 0) {
            fetchPayment(data)
            return;
        }

        if (elements == null) {
            return;
        }

        const { error, paymentMethod } = await stripe.createPaymentMethod({
            type: "card",
            card: elements.getElement(CardElement),
        });

        if (error) {
            setLoading(false);
            if (error.type === "validation_error") {
                setErrorStripe(error.message);
            } else {
                setErrorStripe("Al parecer hubo un error! El pago a través de su targeta no se pudo realizar.");
            }
        } else {
            setPaymentMethod(paymentMethod.id);
            fetchPayment({ ...data, paymentMethod: paymentMethod.id })
        }
    };

    const fetchPayment = (data) => {

        router.post(route("payment"), data,
            {
                preserveScroll: true,
                replace: true,
                preserveState: true,
                onStart: visit => { setLoading(true) },
                onFinish: visit => { setLoading(false) },
            });

    }

    const options = {
        style: {
            base: {
                color: "black",
                fontSize: "14px",
                fontFamily: '"Poppins", sans-serif',
                fontSmoothing: "antialiased",
                "::placeholder": {
                    color: "rgb(55 65 81)",
                },
            },
            invalid: {
                color: "#e5424d",
                ":focus": {
                    color: "#303238",
                },
            },
        },
    };
    return (
        <Card title="Información de pago">
            <form onSubmit={handleSubmit}>
                <div className="space-y-5">
                    {order.total ? (
                        <>
                            <div className=" space-y-4 text-gray-700">
                                <div>
                                    <Label htmlFor="card">
                                        Numero de tarjeta
                                    </Label>
                                    <div className="mt-1 w-full rounded border border-dark-blue-400 bg-transparent p-2.5 text-sm ring-0 md:w-3/4">
                                        <CardElement options={options} />
                                    </div>
                                    {errorStripe && (
                                        <div>
                                            <span className="text-red-500 text-sm font-medium mt-1">
                                                {errorStripe}
                                            </span>
                                        </div>
                                    )}
                                </div>
                            </div>
                        </>
                    ) : ""}
                    <div>
                        <Button
                            disabled={Object.keys(data.tickets_quantity).length === 0}
                            processing={loading}>Realizar Pedido</Button>
                    </div>
                    <ValidationErrors errors={errors} />
                    <span className="mt-4 block text-sm  text-gray-400 ">
                        Al hacer clic en 'Realizar pedido', acepta los{" "}
                        <Link
                            href={route('terms_of_service')}
                            className="text-primary-500 font-medium ">
                            Términos y condiciones
                        </Link>
                    </span>
                </div>
            </form>
        </Card>
    );
};

export default PaymentOption;
