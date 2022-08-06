import Button from "@/Components/Button";
import SelectQuantity from "@/Components/SelectQuantity";
import { formatCurrency, formatDate } from "@/Helpers/Helpers";
import { Inertia } from "@inertiajs/inertia";
import { usePage } from "@inertiajs/inertia-react";
import React, { useState, useEffect } from "react";

const OrderSummary = ({ date, summary, event, tickets_selected }) => {

	return (
		<div className="divide-y divide-dashed divide-dark-blue-500 rounded border border-dark-blue-500 bg-dark-blue-700 p-7">
			<div className="pb-6 text-center">
				<h5 className="font-medium uppercase">Resumen de pedido</h5>
			</div>

			<div className=" space-y-4 py-6 ">
				<div>
					<Title>Evento</Title>
					<SubTitle className="mt-2">{event.title}</SubTitle>
				</div>

				<div>
					<Title>Fecha</Title>
					<SubTitle className="mt-2">
						{formatDate(date)}
					</SubTitle>
				</div>

				<div>
					<Title>Boletos</Title>
					{tickets_selected.map((item, key) => (
						<SubTitle className="mt-2" key={item.name}>
							<div className="flex justify-between gap-3">
								<div>
									{item.quantity_selected} x {item.name}
								</div>
								<div>{formatCurrency(item.price_quantity)}</div>
							</div>
						</SubTitle>
					))}
				</div>
			</div>

			<div className=" relative space-y-4 py-6 ">
				<SubTitle>
					<div className="flex justify-between gap-3">
						<div>Sub total</div>
						<div>{formatCurrency(summary.sub_total)}</div>
					</div>
					<div className="mt-1 flex justify-between gap-3">
						<div>Tarifa {summary.fee_porcent * 100}%</div>
						<div>{formatCurrency(summary.fee)}</div>
					</div>
				</SubTitle>
				<Title>
					<div className="mt-1 flex justify-between gap-3">
						<div>Monto a Pagar</div>
						<div>{formatCurrency(summary.total)}</div>
					</div>
				</Title>

			</div>


		</div>
	);
};

const Title = ({ children }) => {
	return (
		<div className="text-lg font-medium uppercase text-white">
			{children}
		</div>
	);
};

const SubTitle = ({ className, children }) => {
	return (
		<span className={"block text-sm uppercase text-blue-300 " + className}>
			{children}
		</span>
	);
};

export default OrderSummary;
