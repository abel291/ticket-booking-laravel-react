//import Pagination from "@/componentss/Pagination";
import OrderStatuBadges from "@/Components/OrderStatuBadges";
import Pagination from "@/Components/Pagination";
import { formatCurrency, formatDate } from "@/Helpers/Helpers";
import { Link } from "@inertiajs/inertia-react";

import MyAccount from "./MyAccount";

const MyOrders = ({ orders }) => {
    return (
        <MyAccount title="Mis Compras">
            <table className="w-full overflow-hidden rounded-lg">
                <thead>
                    <tr className="bg-dark-blue-700">
                        <th className="text-heading  p-4 text-left font-medium">
                            Evento
                        </th>

                        <th className="text-heading  p-4 text-left font-medium">
                            Evento y fecha de compra
                        </th>
                        <th className="text-heading  p-4 text-left font-medium">
                            Estado
                        </th>
                        <th className="text-heading  p-4 text-left font-medium">
                            Boletos
                        </th>
                        <th className="text-heading  p-4 text-left font-medium">
                            Total
                        </th>
                        {/* <th className="p-4  text-heading font-medium text-left">
                            Opciones
                        </th> */}
                    </tr>
                </thead>
                <tbody className="divide-y divide-dark-blue-700">
                    {orders.data.map((item, index) => (
                        <tr key={index} className="hover:bg-dark-blue-700">
                            <td className="px-4 py-4 text-left underline">
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
                            <td className="px-4 py-4 text-left ">
                                <div className="font-medium">
                                    {item.event_data.title}
                                </div>
                                <span className="text-sm">
                                    {formatDate(item.created_at)}
                                </span>
                            </td>
                            <td className="px-4 py-4 text-left  ">
                                <OrderStatuBadges status={item.status} />
                            </td>
                            <td className="px-4 py-4 text-left ">
                                {item.quantity}
                            </td>
                            <td className="px-4 py-4 text-left ">
                                {formatCurrency(item.total)}
                            </td>
                            {/* <td className="px-4 py-4 text-left ">
                                <button>Cancelar pedido</button>
                            </td> */}
                        </tr>
                    ))}
                </tbody>
            </table>
            <div className="border-t border-dark-blue-400 px-4 py-4 ">
                <Pagination data={orders} />
            </div>
        </MyAccount>
    );
};

export default MyOrders;
