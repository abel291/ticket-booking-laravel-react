
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
import { useForm, usePage, useRemember } from "@inertiajs/inertia-react";
import { Elements } from "@stripe/react-stripe-js";
import { loadStripe } from "@stripe/stripe-js";
import ValidationErrors from "@/Components/ValidationErrors";
import ItemsLoading from "@/Components/ItemsLoading";
import BannerHero from "@/Components/BannerHero";
const Payment = ({ event, session_selected, tickets_selected, summary }) => {
	const [stripePromise] = useState(loadStripe("pk_test_ejdWQWajqC4QwST95KoZiDZK"))


	const [data, setData] = useState({
		session_selected: session_selected,
		tickets_selected: tickets_selected,
		summary: summary,
		code_promotion: filters.code_promotion || "",
		name: auth.user.name,
		phone: auth.user.phone,
		event_slug: event.slug,
	})


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
							<ItemsLoading loading={loading}>
								<OrderSummary
									event={event}
									date={data.date}
									summary={data.summary}
									handleSubmit={handleSubmit}
									loading={loading}
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

export default Payment;


