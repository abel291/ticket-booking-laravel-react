
import { formatCurrency, formatDate } from "@/Helpers/Helpers";
import { Link } from "@inertiajs/inertia-react";
import MyAccount from "./MyAccount";

const OrderDetails = ({ orderDetails }) => {
    console.log(orderDetails)
    return (
        <MyAccount title={"Codigo: #" + orderDetails.code}>
            <div className="grid grid-cols-2 gap-3">
                <div>
                    <h3 className="font-medium text-xl">Datos del Usuario</h3>
                    <div className="space-y-3 mt-3 text-sm">
                        <Data title="Nombre">
                            {orderDetails.user_data.name}
                        </Data>

                        <Data title="Telefono">
                            {orderDetails.user_data.phone}
                        </Data>

                        <Data title="Email">
                            {orderDetails.user_data.email}
                        </Data>

                        <Data title="Nota">
                            {orderDetails.note}
                        </Data>

                        <Data title="Fecha de compra">
                            {formatDate(orderDetails.created_at)}
                        </Data>
                    </div>
                </div>

                <div>
                    <h3 className="font-medium text-xl">Datos del Evento</h3>
                    <div className="space-y-3 mt-3 text-sm">
                        <Data title="Nombre del Evento" >
                            {orderDetails.event_data.title}
                        </Data>

                        <Data title="Duracion" >
                            {orderDetails.event_data.duration}
                        </Data>

                        <Data title="Direccion" >
                            <div>{orderDetails.event_data.location_name}</div>
                            <div>{orderDetails.event_data.location_address}</div>
                        </Data>
                        <Data title="Fecha del evento" >
                            {formatDate(orderDetails.session)}
                        </Data>
                        <a className="btn" href={route('profile.order_details_pdf', { code: orderDetails.code })}>Imprimir Boleto</a>

                    </div>
                </div>
            </div>
            <div>
                <table className="w-full rounded-lg overflow-hidden table-fixed">
                    <thead>
                        <tr className="bg-dark-blue-700">
                            <th className="p-3  text-heading font-semibold text-left">
                                Tipos Boletos
                            </th>
                            <th className="p-3  text-heading font-semibold text-left">
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
                                    {formatCurrency(
                                        item.total
                                    )}
                                </td>
                            </tr>
                        ))}
                        <tr className="font-semibold italic bg-dark-blue-700">
                            <td className="p-3 ">Subtotal</td>
                            <td className="p-3">
                                {formatCurrency(orderDetails.sub_total)}
                            </td>
                        </tr>

                        <tr className="font-semibold italic bg-dark-blue-700">
                            <td className="p-3 ">Tarifa {orderDetails.fee_porcent}</td>
                            <td className="p-3">
                                {formatCurrency(orderDetails.fee)}
                            </td>
                        </tr>

                        {orderDetails.promotion_data && (
                            <tr className="font-semibold italic bg-dark-blue-700">
                                <td className="p-3 ">Promocion</td>
                                <td className="p-3">
                                    -{formatCurrency(orderDetails.promotion_data.applied)}
                                </td>
                            </tr>
                        )}
                        <tr className="font-bold text-lg bg-dark-blue-700">
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
            <span className="font-medium text-xs mr-3 block text-emerald-500">{title}</span>
            <div>{children}</div>
        </div>
    )
}

export default OrderDetails;
