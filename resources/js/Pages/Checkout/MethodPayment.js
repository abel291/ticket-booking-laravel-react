
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
import PromoCode from "./PromoCode";
import ContactDetails from "./ContactDetails";

const MethodPayment = ({ event, summary, session_selected, tickets_selected }) => {
	console.log(tickets_selected)
	const { auth, errors } = usePage().props

	const [loading, setLoading] = useState(false)

	const [data, setData] = useState({
		name: "",
		phone: "",
		code_promotion: ""
	})
	const handleSubmit = (e) => {
		e.preventDefault()
	}

	const handleSubmitCodePromotion = (e) => {
		e.preventDefault()

		let new_tickets_selected = {}

		data.tickets_selected.forEach((i) => {
			new_tickets_selected[i.id] = i.quantity_selected
		})

		Inertia.get(route("checkout_method_payment", { slug: event.slug }), {
			session_selected: session_selected,
			tickets_selected: new_tickets_selected,
			code_promotion: data.code_promotion,
		},
			{
				preserveScroll: true,
				replace: true,
				preserveState: true,
				onStart: visit => { setLoading(true) },
				onFinish: visit => { setLoading(false) },
			});
	}


	


	return (
		<Layout title="Checkout">
			<BannerHero img={event.banner} title="Checkout" desc="" />

			<div className="py-section container">

				<div className="grid grid-cols-1 gap-6 lg:grid-cols-12">
					<div className=" lg:col-span-8">
						<div className="space-y-6">
							<ValidationErrors errors={errors} />

							<ContactDetails data={data} setData={setData} />

							{/* <Elements stripe={stripePromise} >
								<PaymentOption data={data} />
							</Elements> */}
						</div>
					</div>

					<div className="lg:col-span-4  ">
						<div className="space-y-6">
							<OrderSummary
								event={event}
								summary={summary}
								session_selected={session_selected}
								tickets_selected={tickets_selected}
								handleSubmit={handleSubmit}
								loading={loading}

							/>

							<PromoCode handleSubmit={handleSubmitCodePromotion} data={data} setData={setData} />
						</div>
					</div>
				</div>
			</div>
		</Layout>
	);
};

export default MethodPayment;
