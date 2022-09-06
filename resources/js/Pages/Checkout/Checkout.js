
import Layout from "@/Layouts/Layout";
import React from "react";
import OrderSummary from "./OrderSummary";
import QuantityTicket from "./QuantityTicket";
import SelectDate from "./SelectDate";
import { useState, useEffect, useRef } from "react";
import { Inertia } from "@inertiajs/inertia";
import ContactDetails from "./ContactDetails";
import PromoCode from "./PromoCode";
import PaymentOption from "./PaymentOption";
import { useForm, usePage } from "@inertiajs/inertia-react";
import { Elements } from "@stripe/react-stripe-js";
import { loadStripe } from "@stripe/stripe-js";
import ValidationErrors from "@/Components/ValidationErrors";
import ItemsLoading from "@/Components/ItemsLoading";
import BannerHero from "@/Components/BannerHero";
const Checkout = ({ event, sessions, tickets, filters, summary, tickets_selected }) => {
	console.log(tickets_selected);
	const { auth, errors } = usePage().props

	const [loading, setLoading] = useState(false)

	const [data, setData] = useState({
		date: filters.date || sessions[0].date,
		tickets_quantity: typeof filters.tickets_quantity == "object" ? filters.tickets_quantity : {},
		code_promotion: filters.code_promotion || "",
		name: auth.user.name,
		phone: auth.user.phone,
		event_slug: event.slug,
	})

	const initUpdate = useRef(true)

	useEffect(() => {
		console.log(data.date)
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
			onStart: visit => { setLoading(true) },
			onFinish: visit => { setLoading(false) },
		});
	}, [data.date, data.tickets_quantity, data.code_promotion])

	const [stripePromise] = useState(loadStripe("pk_test_ejdWQWajqC4QwST95KoZiDZK"))

	return (
		<Layout title="Checkout">
			<BannerHero img={event.banner} title="Checkout" desc="" />

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
							<ContactDetails data={data} setData={setData} />

							<Elements stripe={stripePromise} >
								<PaymentOption data={data} />
							</Elements>
						</div>
					</div>

					<div className="lg:col-span-4  ">
						<div className="space-y-6">
							<ItemsLoading loading={loading}>
								<OrderSummary
									event={event}
									summary={summary}
									data={data}
									tickets_selected={tickets_selected}
								/>
							</ItemsLoading>
							{summary.total ? (
								<PromoCode data={data} setData={setData} />
							) : ""}
						</div>
					</div>
				</div>
			</div>
		</Layout>
	);
};

export default Checkout;
