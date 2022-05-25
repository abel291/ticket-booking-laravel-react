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
const Checkout = ({ event, sessions, tickets, filters, summary }) => {
    const { auth } = usePage().props

    const [data, setData,] = useState({
        date: filters.date || sessions[0].date,
        tickets_quantity: typeof filters.tickets_quantity === 'object' ? filters.tickets_quantity : {},
        code_promotion: filters.code_promotion || ""
    })
    
    const handleChangeSession = (e) => {
        setData({
            ...data,
            date: e.target.value,
            tickets_quantity: {}
        });
    };
    const handleChangeTickets = (e) => {
        let id = e.target.name;
        let quantity_selected = parseInt(e.target.value);

        let new_tickets_quantity = data.tickets_quantity;

        if (quantity_selected > 0) {
            new_tickets_quantity[id] = quantity_selected;
        } else {
            delete new_tickets_quantity[id];
        }
        setData({ ...data, tickets_quantity: new_tickets_quantity });
    };

    const initUpdate = useRef(true)
    useEffect(() => {

        if (initUpdate.current) {
            initUpdate.current = false
            return
        }
        Inertia.get(route("checkout", { slug: event.slug }), data, {
            preserveScroll: true,
            replace: true,
            preserveState: true,
        });
    }, [data])

    const { data: user, setData: setUser } = useForm({
        name: auth.user.name,
        phone: auth.user.phone,
    })
    
    const handleChangeContact = (e) => {
        let target = e.target;
        setUser(target.name, target.value)
    }

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
                                session_selected={data.date}
                                handleChange={handleChangeSession}
                            />

                            <QuantityTicket
                                tickets={tickets}
                                tickets_quantity={data.tickets_quantity}
                                handleChange={handleChangeTickets}
                                session_selected={data.date}
                            />

                            {/* <ContactDetails data={data} handleChange={handleChangeContact}/>*/}

                            <PromoCode data={data} setData={setData} />
                            {/* <PaymentOption /> */}
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
