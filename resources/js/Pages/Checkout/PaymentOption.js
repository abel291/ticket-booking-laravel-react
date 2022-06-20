import React, { useEffect, useState, useRef } from "react";
import Card from "@/Components/Card";
import Button from "@/Components/Button";
import { Link, useForm, usePage } from "@inertiajs/inertia-react";
import ValidationErrors from '@/Components/ValidationErrors';
import { CardElement, Elements, useElements, useStripe } from "@stripe/react-stripe-js";
import { Inertia } from "@inertiajs/inertia";

const PaymentOption = ({ auth, data, setData, processing }) => {

    const { errors } = usePage().props
    const nameCreditCard = useRef();
    const [errorStripe, setErrorStripe] = useState();
    const [paymentMethod, setPaymentMethod] = useState();

    const [loading, setLoading] = useState(false);
    const stripe = useStripe();
    const elements = useElements();

    const handleSubmit = async (e) => {
        e.preventDefault();
        setErrorStripe("");
        setLoading(true);

        if (elements == null) {
            return;
        }

        const { error, paymentMethod } = await stripe.createPaymentMethod({
            type: "card",
            card: elements.getElement(CardElement),
            billing_details: {
                name: nameCreditCard.current.value,
            },
        });
        console.log(paymentMethod)
        if (error) {
            setLoading(false);
            if (error.type === "validation_error") {
                setErrorStripe(error.message);
            } else {
                setErrorStripe("Al parecer hubo un error! El pago a través de su targeta no se pudo realizar.");
            }
        } else {
            setPaymentMethod(paymentMethod.id);
        }        

    };
    useEffect(() => {
        if (paymentMethod) {
            Inertia.post(route("payment"), { ...data, paymentMethod },
                {
                    preserveScroll: true,
                    replace: true,
                    preserveState: true,
                    onStart: visit => { setLoading(true) },
                    onFinish: visit => { setLoading(false) },
                });

        }
    }, [paymentMethod]);
    const options = {
        style: {
            base: {
                color: "white",
                fontSize: "16px",
                fontFamily: '"Poppins", sans-serif',
                fontSmoothing: "antialiased",
                "::placeholder": {
                    color: "#7f85ad",
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
                    <div className="font-medium  text-white lg:text-lg">
                        Datos de la tarjeta de crédito
                    </div>
                    <div className=" space-y-4">
                        <div>
                            <label className="block text-sm" htmlFor="name">
                                Nombre del titular
                            </label>
                            <input
                                ref={nameCreditCard}
                                type="text"
                                name="name"
                                defaultValue={data.name}
                                className="mt-1 w-full rounded border border-dark-blue-400 bg-transparent p-2.5 text-sm ring-0 placeholder:text-blue-300  focus:border-gray-200 focus:ring-0 md:w-1/2 uppercase"
                                required={true}
                            />
                        </div>
                        <div>
                            <label className="block text-sm" htmlFor="card">
                                Numero de tarjeta
                            </label>
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
                    <div>
                        <Button
                            disabled={Object.keys(data.tickets_quantity).length === 0}
                            processing={loading}>Realizar pago</Button>
                    </div>
                    <ValidationErrors errors={errors} />

                    {/* {errors.payment && (
                        <span className="text-red-500 font-semibold">errors.payment</span>
                    )} */}
                    <span className="mt-4 block text-sm font-light">
                        Al hacer clic en 'Realizar pago', acepta los{" "}
                        <Link
                            href={route('terms_of_service')}
                            className="text-emerald-400">
                            Términos y condiciones
                        </Link>
                    </span>
                </div>
            </form>
        </Card>
    );
};

export default PaymentOption;
