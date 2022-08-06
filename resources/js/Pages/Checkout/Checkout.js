
import Layout from "@/Layouts/Layout";
import React from "react";
import OrderSummary from "./OrderSummary";
import QuantityTicket from "./QuantityTicket";
import SelectDate from "./SelectDate";
import { useState, useEffect, useRef } from "react";
import { Inertia } from "@inertiajs/inertia";

import { usePage } from "@inertiajs/inertia-react";

import ValidationErrors from "@/Components/ValidationErrors";
import ItemsLoading from "@/Components/ItemsLoading";
import BannerHero from "@/Components/BannerHero";
import Button from "@/Components/Button";
const Checkout = ({ event, sessions }) => {

	const [loading, setLoading] = useState(false)
	const { fee_porcent } = usePage().props
	const [data, setData] = useState({
		date: sessions[0].date,
		tickets: [...sessions[0].tickets],

		tickets_selected: [],
		summary: {
			sub_total: 0,
			total: 0,
			fee: 0,
			fee_porcent: fee_porcent,
		}
	})

	const handleSubmit = (e) => {
		e.preventDefault();
		let tickets_selected_ids = {}
		data.tickets_selected.forEach((item) => {
			tickets_selected_ids[item.id] = item.quantity_selected
		})

		Inertia.get(route("checkout_payment"), {
			session: data.date,
			tickets_selected: tickets_selected_ids,
			event_slug: event.slug,
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
		let new_summary = {
			...data.summary,
			sub_total: 0,
			total: 0,
			fee: 0,
		};

		let new_tickets_selected = data.tickets
			.filter((i) => (i.quantity_selected > 0))
			.map((item) => {
				item.price_quantity = item.price * item.quantity_selected
				new_summary.sub_total += item.price_quantity
				return item
			})

		new_summary.fee = new_summary.sub_total * new_summary.fee_porcent;
		new_summary.total = new_summary.sub_total - new_summary.fee

		setData({
			...data,
			summary: new_summary,
			tickets_selected: new_tickets_selected
		});

	}, [data.tickets])

	return (

		<Layout title="Checkout">
			<BannerHero img={event.banner} title="Checkout" desc="" />

			<div className="py-section container">
				<div className="grid grid-cols-1 gap-6 lg:grid-cols-12">
					<div className=" lg:col-span-8">
						<div className="space-y-6">
							{/* <ValidationErrors errors={errors} /> */}
							<SelectDate
								sessions={sessions}
								data={data} setData={setData}
							/>

							<QuantityTicket
								data={data} setData={setData}
							/>
						</div>
					</div>

					<div className="lg:col-span-4  ">
						<div className="space-y-6">
							<OrderSummary
								event={event}
								date={data.date}
								tickets_selected={data.tickets_selected}
								summary={data.summary}
								loading={loading}
							/>
							<div>
								<form onSubmit={handleSubmit}>
									<Button className="w-full btn bg-gradient-red-invert relative disabled:opacity-30"
										disabled={data.tickets_selected.length === 0}
										processing={loading}
									>Proceder al Pago</Button>
								</form>

							</div>
						</div>
					</div>
				</div>

			</div>

		</Layout>
	);


};



export default Checkout;


