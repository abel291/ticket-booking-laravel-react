//import Pagination from "@/componentss/Pagination";
import Pagination from "@/Components/Pagination";
import { formatCurrency, formatDate } from "@/Helpers/Helpers";
import { Link } from "@inertiajs/inertia-react";

import MyAccount from "./MyAccount";

const MyOrders = ({ orders }) => {

    return (
        <MyAccount title="Mis Compras">
            <table className="w-full rounded-lg overflow-hidden">
                <thead>
                    <tr className="bg-dark-blue-700">
                        <th className="p-4  text-heading font-medium text-left">
                            Evento
                        </th>

                        <th className="p-4  text-heading font-medium text-left">
                            Evento y fecha de compra
                        </th>
                        <th className="p-4  text-heading font-medium text-left">
                            Estado
                        </th>
                        <th className="p-4  text-heading font-medium text-left">
                            Boletos
                        </th>
                        <th className="p-4  text-heading font-medium text-left">
                            Total
                        </th>
                        {/* <th className="p-4  text-heading font-medium text-left">
                            Opciones
                        </th> */}
                    </tr>
                </thead>
                <tbody className="divide-y divide-dark-blue-700">
                    {orders.data.map((item, index) => (
                        <tr key={index}>
                            <td className="px-4 py-5 text-left underline">
                                <Link
                                    preserveScroll
                                    className="text-sm"
                                    href={route("profile.order_details", [item.code])}
                                >
                                    #{item.code}
                                </Link>
                            </td>
                            <td className="px-4 py-5 text-left ">
                                <div className="font-medium">{item.event_data.title}</div>
                                <span className="text-sm">{formatDate(item.created_at)}</span>
                            </td>
                            <td className="px-4 py-5 text-left  ">
                                <span className="text-xs px-2 py-1 inline-flex leading-5  rounded-full text-white bg-dark-blue-400">
                                    {item.status}
                                </span>
                                {/* {item.state == "successful" && (
                                    <span className="px-2 py-1 inline-flex leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Completado
                                    </span>
                                )}
                                {item.state == "refunded" && (
                                    <span className="px-2 py-1 inline-flex leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                        Rembolsado
                                    </span>
                                )}
                                {item.state == "canceled" && (
                                    <span className="px-2 py-1 inline-flex leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                        Rembolsado
                                    </span> 
                                )}*/}
                            </td>
                            <td className="px-4 py-5 text-left ">
                                {item.quantity}
                            </td>
                            <td className="px-4 py-5 text-left ">
                                {formatCurrency(item.total)}
                            </td>
                            {/* <td className="px-4 py-5 text-left ">
                                <button>Cancelar pedido</button>
                            </td> */}
                        </tr>
                    ))}
                </tbody>
            </table>
            <div className="border-t border-dark-blue-400 px-4 py-5 ">
                <Pagination data={orders} />
            </div>
        </MyAccount>
    );
};

export default MyOrders;
