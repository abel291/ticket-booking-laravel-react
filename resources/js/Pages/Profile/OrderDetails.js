import OrderStatuBadges from "@/Components/OrderStatuBadges";
import { formatCurrency, formatDate } from "@/Helpers/Helpers";
import { Link } from "@inertiajs/inertia-react";
import MyAccount from "./MyAccount";

const OrderDetails = ({ orderDetails }) => {
	return (
		<MyAccount title={"Codigo: #" + orderDetails.code}>
			<div className="grid grid-cols-3 gap-4">
				<div>
					<h3 className="text-xl font-medium">Datos del Evento</h3>
					<div className="mt-2 space-y-3 ">
						<Data title="Nombre del Evento">
							{orderDetails.event_data.title}
						</Data>

						<Data title="Duracion">
							{orderDetails.event_data.duration}
						</Data>

						<Data title="Direccion">
							<div>{orderDetails.event_data.location_name}</div>
							<div>
								{orderDetails.event_data.location_address}
							</div>
						</Data>
						<Data title="Fecha del evento">
							{formatDate(orderDetails.session)}
						</Data>

					</div>
				</div>

				<div>
					<h3 className="text-xl font-medium">Datos del Usuario</h3>
					<div className="mt-2 space-y-3 ">
						<Data title="Nombre">
							{orderDetails.user_data.name}
						</Data>

						<Data title="Telefono">
							{orderDetails.user_data.phone}
						</Data>

						<Data title="Email">
							{orderDetails.user_data.email}
						</Data>
					</div>
				</div>

				<div>
					<h3 className="text-xl font-medium">Datos de Pago</h3>
					<div className="mt-2 space-y-3 ">
						<Data title="Fecha de compra">
							{formatDate(orderDetails.created_at)}
						</Data>
						<Data title="Estado del Pago">
							<div className="mt-2 flex items-center gap-x-2">
								<OrderStatuBadges
									status={orderDetails.status}
								/>
								{orderDetails.status === "successful" && (
									<div>
										<Link
											href={route("profile.cancel_order", {
												code: orderDetails.code,
											})}
											className="text-xs  text-red-600"
										>
											Cancelar Boleto
										</Link>
									</div>
								)}
							</div>
						</Data>

						{orderDetails.status != "successful" && (
							<Data title="Fecha de cancelacion">
								{formatDate(orderDetails.canceled_at)}
							</Data>
						)}

						<Data title="Nota">
							{orderDetails.note ? orderDetails.note : "-"}
						</Data>
						<a
							className="btn bg-gradient-red-invert"
							href={route("profile.order_details_pdf", {
								code: orderDetails.code,
							})}
							target="blank"
						>
							Imprimir Boleto
						</a>
					</div>
				</div>
			</div>

			<div>
				<table className="w-full table-fixed overflow-hidden rounded-lg">
					<thead>
						<tr className="bg-dark-blue-700">
							<th className="text-heading  p-3 text-left font-semibold">
								Tipos Boletos
							</th>
							<th className="text-heading  p-3 text-left font-semibold">
								Monto
							</th>
						</tr>
					</thead>
					<tbody className="divide-y divide-dark-blue-700">
						{orderDetails.tickets.map((item, index) => (
							<tr key={index}>
								<td className="p-3">
									{item.quantity} x {item.name}
								</td>
								<td className="p-3">
									{formatCurrency(item.total)}
								</td>
							</tr>
						))}
						<tr className="bg-dark-blue-700 font-semibold italic">
							<td className="p-3 ">Subtotal</td>
							<td className="p-3">
								{formatCurrency(orderDetails.sub_total)}
							</td>
						</tr>

						<tr className="bg-dark-blue-700 font-semibold italic">
							<td className="p-3 ">
								Tarifa {orderDetails.fee_porcent}
							</td>
							<td className="p-3">
								{formatCurrency(orderDetails.fee)}
							</td>
						</tr>

						{orderDetails.promotion_data && (
							<tr className="bg-dark-blue-700 font-semibold italic">
								<td className="p-3 ">Promocion</td>
								<td className="p-3">
									-
									{formatCurrency(
										orderDetails.promotion_data.applied
									)}
								</td>
							</tr>
						)}
						<tr className="bg-dark-blue-700 text-lg font-bold">
							<td className="p-3 ">Total</td>
							<td className="p-3">
								{formatCurrency(orderDetails.total)}
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</MyAccount>
	);
};
const Data = ({ title, children }) => {
	return (
		<div>
			<span className=" mr-3 block text-xs text-emerald-500">
				{title}
			</span>
			<div className="text-sm">{children}</div>
		</div>
	);
};

export default OrderDetails;
