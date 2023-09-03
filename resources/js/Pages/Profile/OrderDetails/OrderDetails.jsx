import OrderStatuBadges from "@/Components/OrderStatuBadges";
import { formatCurrency, formatDate } from "@/Helpers/Helpers";
import { Link } from "@inertiajs/react";
import MyAccount from "../MyAccount";
import { PaperClipIcon } from "@heroicons/react/24/outline";
import OrderTotalPrice from "./OrderTotalPrice";

const OrderDetails = ({ order }) => {
    console.log(order)
    return (
        <MyAccount title={"Detalles del pedido: #" + order.code}>

            <div className="mt-4">
                <h3 className="font-medium text-lg">Detalles de evento</h3>
                <dl class="grid grid-cols-2 gap-4 mt-2" >

                    <Data title="Nombre del Evento">
                        {order.data.event.title}
                    </Data>

                    <Data title="Duracion">
                        {order.data.event.duration}
                    </Data>

                    <Data title="Direccion">
                        <div>{order.data.event.location_name}</div>
                        <div>
                            {order.data.event.location_address}
                        </div>
                    </Data>
                    <Data title="Fecha del evento">
                        {formatDate(order.data.session)}
                    </Data>

                </dl>

            </div>
            <div className="mt-8">
                <h3 className="font-medium text-lg">Detalles de compra</h3>
                <dl class="grid grid-cols-2 gap-4 mt-2" >

                    <Data title="Nombre">
                        {order.data.user.name}
                    </Data>

                    <Data title="Telefono">
                        {order.data.user.phone}
                    </Data>

                    <Data title="Email">
                        {order.data.user.email}
                    </Data>

                    <Data title="Fecha de compra">
                        {formatDate(order.created_at)}
                    </Data>
                    <Data title="Estado del Pago">
                        <div className="mt-2">
                            <OrderStatuBadges status={order.status} />

                        </div>
                    </Data>

                    {order.status != "successful" && (
                        <Data title="Fecha de cancelacion">
                            {formatDate(order.canceled_at)}
                        </Data>
                    )}

                    <Data title="Nota">
                        {order.note ? order.note : "-"}
                    </Data>

                    <Data title="Archivos adjuntos">
                        <div className="mt-2">
                            <ul role="list" class="">
                                <li class="flex items-center  pr-5 text-sm leading-6">
                                    <div class="flex items-center">
                                        <PaperClipIcon class="h-5 w-5 flex-shrink-0 text-gray-400" />
                                        <div class="ml-2 flex min-w-0 flex-1 gap-2">
                                            <span class="truncate font-medium">{order.code}.pdf</span>
                                        </div>
                                    </div>
                                    <div class="ml-4 flex-shrink-0">
                                        <a href={route('profile.order_details_pdf', order.code)} class="font-medium text-primary-600 hover:text-primary-500">Ver Boletos</a>
                                    </div>
                                </li>

                            </ul>
                        </div>

                    </Data>
                </dl>

            </div>



            <div className="mt-10">
                <table className="w-full table-list">
                    <thead>
                        <tr>
                            <th>Tipos Boletos</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Monto</th>
                        </tr>
                    </thead>
                    <tbody>
                        {order.order_tickets.map((item, index) => (
                            <tr key={index}>
                                <td >{item.name}</td>
                                <td >{formatCurrency(item.price)}</td>
                                <td >{item.quantity}</td>
                                <td >{formatCurrency(item.total)}</td>
                            </tr>
                        ))}
                    </tbody>
                </table>
                <OrderTotalPrice order={order} />
            </div>
        </MyAccount>
    );
};
const Data = ({ title, children }) => {
    return (
        <>
            <div>
                <div className=" text-xs  font-medium text-primary-500">
                    {title}
                </div>
                <div className=" block">{children}</div>
            </div>


        </>
    );
};

export default OrderDetails;
