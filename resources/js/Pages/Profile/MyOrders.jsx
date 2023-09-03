//import Pagination from "@/componentss/Pagination";
import OrderStatuBadges from "@/Components/OrderStatuBadges";
import Pagination from "@/Components/Pagination";
import { formatCurrency, formatDate } from "@/Helpers/Helpers";
import { Link } from "@inertiajs/react";

import MyAccount from "./MyAccount";

const MyOrders = ({ orders }) => {
    return (
        <MyAccount title="Mis Compras">
            <table className="table-list w-full">
                <thead>
                    <tr >
                        <th>Codigo</th>
                        <th>Evento</th>
                        <th>Fecha de compra</th>
                        <th>Estado</th>
                        <th>Boletos</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody className="divide-y text-sm">
                    {orders.data.map((item, index) => (
                        <tr key={index} >
                            <td className="text-left underline">
                                <Link
                                    preserveScroll
                                    className="text-sm"
                                    href={route("profile.order_details", [
                                        item.code,
                                    ])}
                                >
                                    #{item.code}
                                </Link>
                            </td>
                            <td className="text-left ">
                                <div className="font-medium">
                                    {item.data.event.title}
                                </div>

                            </td>
                            <td>
                                <span className="text-sm">
                                    {formatDate(item.created_at)}
                                </span>
                            </td>
                            <td className="text-left  ">
                                <OrderStatuBadges status={item.status} />
                            </td>
                            <td className=" text-left ">
                                {item.quantity}
                            </td>
                            <td className=" text-left ">
                                {formatCurrency(item.total)}
                            </td>
                            <td className=" text-left ">
                                <Link
                                    preserveScroll
                                    className="text-blue-500 font-medium"
                                    href={route("profile.order_details", [
                                        item.code,
                                    ])}
                                >Ver pedido</Link>
                            </td>
                        </tr>
                    ))}
                </tbody>
            </table>
            <div className="border-t pt-4">
                <Pagination data={orders} />
            </div>
        </MyAccount>
    );
};

export default MyOrders;
