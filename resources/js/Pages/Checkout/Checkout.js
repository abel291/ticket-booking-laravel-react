import BannerCheckout from "@/Components/BannerCheckout";
import Layout from "@/Layouts/Layout";
import { useForm } from "@inertiajs/inertia-react";
import React from "react";
import OrderSummary from "../SelectFood/OrderSummary";
import ContactDetails from "./ContactDetails";
import PaymentOption from "./PaymentOption";
import PromoCode from "./PromoCode";

const Checkout = () => {
    const { data, setData, post, processing, errors } = useForm({
        name: "User",
        email: "email@email.com",
        phone: "+343356675",
    });
    return (
        <Layout title="Checkout">
            <BannerCheckout
                title="La Familia Mitchell Vs. Las Máquinas"
                lang="ENGLISH, HINDI TELEGU TAMIL"
            />
            <div className="py-section container">
                <div className="grid grid-cols-1 gap-6 lg:grid-cols-12">
                    <div className=" lg:col-span-8">
                        <div className="grid grid-cols-1 gap-6">
                        <ContactDetails data={data} setData={setData} />
                        <PromoCode />
                        <PaymentOption />
                        </div>
                    </div>

                    <div className="lg:col-span-4  ">
                        <OrderSummary />
                    </div>
                </div>
            </div>
        </Layout>
    );
};

export default Checkout;
