import BannerCheckout from "@/Components/BannerCheckout";
import Layout from "@/Layouts/Layout";
import React from "react";
import OrderSummary from "./OrderSummary";
import QuantityTicket from "./QuantityTicket";
import SelectDate from "./SelectDate";
import { useState, useEffect, useRef } from "react";
import { Inertia } from "@inertiajs/inertia";
import ContactDetails from "./PaymentMethods/ContactDetails";
import PromoCode from "./PaymentMethods/PromoCode";
import PaymentOption from "./PaymentMethods/PaymentOption";
import { useForm, usePage } from "@inertiajs/inertia-react";
import { Elements } from "@stripe/react-stripe-js";
import { loadStripe } from "@stripe/stripe-js";
import ValidationErrors from "@/Components/ValidationErrors";
const Checkout = ({ event, sessions, tickets, filters, summary }) => {
   
    const { auth, errors } = usePage().props

    const { data, setData, post, processing } = useForm({
        date: filters.date || sessions[0].date,
        tickets_quantity: typeof filters.tickets_quantity == "object" ? filters.tickets_quantity : {},
        code_promotion: filters.code_promotion || "",
        name: auth.user.name,
        phone: auth.user.phone,
        event_slug: event.slug,
    })
    console.log(data)

    const initUpdate = useRef(true)
    useEffect(() => {

        if (initUpdate.current) {
            initUpdate.current = false
            return
        }
        Inertia.get(route("checkout", { slug: event.slug }), {
            date: data.date,
            tickets_quantity: data.tickets_quantity,
            code_promotion: data.code_promotion,
        }, {
            preserveScroll: true,
            replace: true,
            preserveState: true,
        });
    }, [data.date, data.tickets_quantity, data.code_promotion])

    const [stripePromise] = useState(loadStripe("pk_test_ejdWQWajqC4QwST95KoZiDZK"))

    return (
        <Layout title="Checkout">
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
                            <ValidationErrors errors={errors} />
                            <SelectDate
                                sessions={sessions}
                                data={data} setData={setData}
                            />

                            <QuantityTicket
                                tickets={tickets}
                                data={data} setData={setData}
                            />
                            <PromoCode data={data} setData={setData} />

                            <ContactDetails data={data} setData={setData} />

                            <Elements stripe={stripePromise} >
                                <PaymentOption data={data} setData={setData} post={post} processing={processing} />
                            </Elements>

                        </div>
                    </div>

                    <div className="lg:col-span-4  ">
                        <div className="space-y-6">
                            <OrderSummary
                                event={event}
                                session_selected={data.date}
                                summary={summary}
                            />
                        </div>
                    </div>
                </div>
            </div>
        </Layout>
    );
};

export default Checkout;
