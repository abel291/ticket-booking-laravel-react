
import Layout from "@/Layouts/Layout";
import React from "react";
import OrderSummary from "./OrderSummary";
import QuantityTicket from "./QuantityTicket";
import SelectDate from "./SelectDate";
import { useState, useEffect, useRef } from "react";
import { Inertia } from "@inertiajs/inertia";
// import ContactDetails from "./ContactDetails";
// import PromoCode from "./PromoCode";
// import PaymentOption from "./PaymentOption";
import { usePage } from "@inertiajs/inertia-react";
// import { Elements } from "@stripe/react-stripe-js";
// import { loadStripe } from "@stripe/stripe-js";
import ValidationErrors from "@/Components/ValidationErrors";
import ItemsLoading from "@/Components/ItemsLoading";
import BannerHero from "@/Components/BannerHero";

const Checkout = ({ event, sessions_available, fee_porcent }) => {

	const { auth, errors } = usePage().props

	const [loading, setLoading] = useState(false)

	const [data, setData] = useState({
		sessions: sessions_available,
		tickets: sessions_available[0].tickets_available,
		session_selected: sessions_available[0].date,
		tickets_selected: [],
		event_slug: event.slug,
		summary: {}
	})

	const handleSubmit = (e) => {
		e.preventDefault()

		let new_tickets_selected = {}

		data.tickets_selected.forEach((i) => {
			new_tickets_selected[i.id] = i.quantity_selected
		})

		Inertia.get(route("checkout_method_payment", { slug: event.slug }), {
			session_selected: data.session_selected,
			tickets_selected: new_tickets_selected,
			//code_promotion: data.code_promotion,
		},
			{
				preserveScroll: true,
				replace: true,
				preserveState: true,
				onStart: visit => { setLoading(true) },
				onFinish: visit => { setLoading(false) },
			});
	}

	useEffect(() => {
		let summary = { sub_total: 0, fee_porcent }

		let tickets_selected = data.tickets
			.filter((i) => i.quantity_selected > 0)
			.map((i) => {

				let price_quantity = i.price * i.quantity_selected;
				summary.sub_total += price_quantity;
				return {
					...i,
					price_quantity: price_quantity
				}
			})

		summary.fee = summary.sub_total * fee_porcent

		summary.total = parseFloat(summary.sub_total + summary.fee)
		console.log(summary)
		setData({
			...data,
			tickets_selected,
			summary

		});





	}, [data.session_selected, data.tickets])

	// const [stripePromise] = useState(loadStripe("pk_test_ejdWQWajqC4QwST95KoZiDZK"))

	return (
		<Layout title="Checkout">
			<BannerHero img={event.banner} title="Checkout" desc="" />

			<div className="py-section container">

				<div className="grid grid-cols-1 gap-6 lg:grid-cols-12">
					<div className=" lg:col-span-8">
						<div className="space-y-6">
							<ValidationErrors errors={errors} />
							<SelectDate
								data={data} setData={setData}
							/>

							<QuantityTicket
								data={data} setData={setData}
							/>
							{/* <ContactDetails data={data} setData={setData} />

							<Elements stripe={stripePromise} >
								<PaymentOption data={data} />
							</Elements> */}
						</div>
					</div>

					<div className="lg:col-span-4  ">
						<div className="space-y-6">
							<OrderSummary
								event={event}
								summary={data.summary}
								session_selected={data.session_selected}
								tickets_selected={data.tickets_selected}
								handleSubmit={handleSubmit}
								loading={loading}

							/>

							{/* {summary.total ? (
								<PromoCode data={data} setData={setData} />
							) : ""} */}
						</div>
					</div>
				</div>
			</div>
		</Layout>
	);
};

export default Checkout;
