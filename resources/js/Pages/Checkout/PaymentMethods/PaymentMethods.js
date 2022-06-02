import BannerCheckout from "@/Components/BannerCheckout";
import Layout from "@/Layouts/Layout";
import { useForm, usePage } from "@inertiajs/inertia-react";

import React from "react";

import OrderSummary from "./../OrderSummary";
import ContactDetails from "./ContactDetails";
import PaymentOption from "./PaymentOption";
import PromoCode from "./PromoCode";

const PaymentMethods = ({ event, sessionSelected,ticketTypesSelected, summary }) => {
    const { auth } = usePage().props;

    const { data, setData, post, processing, errors } = useForm({
        email: "",
        name: "",
        phone: "",
    });
    const handleChange = (e) => {
        let target = e.target;
        setData(target.name, target.value);
    };
    return (
        <Layout title="Metodo de pago">
            {/* <BannerEvent
                img="/img/event/banner.jpg"
                title={event.title}
                desc={event.desc_min}
            /> */}
            <BannerCheckout
                title="La Familia Mitchell Vs. Las Máquinas"
                lang="ENGLISH, HINDI TELEGU TAMIL"
            />
            <div className="py-section container">
                <div className="grid grid-cols-1 gap-6 lg:grid-cols-12">
                    <div className=" lg:col-span-8">
                        <div className="space-y-6">
                            <ContactDetails
                                data={data}
                                handleChange={handleChange}
                            />
                            <PromoCode />
                            <PaymentOption />
                        </div>
                    </div>

                    <div className="lg:col-span-4  ">
                        <div className="space-y-6">
                            <OrderSummary
                                event={event}
                                sessionSelected={session}
                                summary={summary}
                            />
                        </div>
                    </div>
                </div>
            </div>
        </Layout>
    );
};

export default PaymentMethods;
