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
const Checkout = ({ event, sessions, sessionSelected, tickets, summary }) => {
    const { auth } = usePage().props
    
    const handleChangeSession = (e) => {

        fetch({
            date: e.target.value,
        });
    };

    const handleChangeTickets = (e) => {
        let id = parseInt(e.target.name);

        let quantitySelected = parseInt(e.target.value);

        let ticketFind = tickets.find((item) => item.id == id);
        ticketFind.quantitySelected = quantitySelected;
        // if (quantitySelected > 0) {
        //     ticketFind.quantitySelected = quantitySelected;
        // } else {
        //     delete ticketFind.quantitySelected;
        // }

        fetch({
            date: sessionSelected,
            tickets_quantity: tickets,
        });
    };

    const fetch = (data) => {
        if (data.tickets_quantity) {

            let ticketSelectedNotEmpty = data.tickets_quantity.filter(function (item, index) {
                return item.quantitySelected;
            });
            let idsQuantityTickets = {};
            ticketSelectedNotEmpty.forEach(({ id, quantitySelected }) => {
                return (idsQuantityTickets[id] = quantitySelected);
            });
            data.tickets_quantity = idsQuantityTickets
        }
        Inertia.get(route("checkout", { slug: event.slug }), data, {
            preserveScroll: true,
            replace: true,
            preserveState: true,
        });
    };

    const { data, setData } = useForm({
        name: auth.user.name,
        phone: auth.user.phone,
    })
    const handleChangeContact = (e) => {
        let target = e.target;
        setData(target.name, target.value)
    }

    // const handleSubmitPromoCode = (e) => {
    //     let target = e.target;

    // }

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

                            <SelectDate
                                sessions={sessions}
                                sessionSelected={sessionSelected}
                                handleChange={handleChangeSession}
                            />

                            <QuantityTicket
                                handleChange={handleChangeTickets}
                                tickets={tickets}
                            />

                            <ContactDetails data={data} handleChange={handleChangeContact} />

                            {/* <PromoCode handleSubmit={handleSubmitPromoCode} /> */}
                            {/* <PaymentOption /> */}
                        </div>
                    </div>

                    <div className="lg:col-span-4  ">
                        <div className="space-y-6">
                            <OrderSummary
                                event={event}
                                sessionSelected={sessionSelected}
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
