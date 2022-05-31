
import { formatCurrency, formatDate } from "@/helpers/helpers";
import MyAccount from "./MyAccount";

const ShoppingDetails = ({ shoppingDetails }) => {
    console.log(shoppingDetails)
    return (
        <MyAccount title={"Codigo: #" + shoppingDetails.code}>
            <div className="grid grid-cols-2 gap-3">
                <div>
                    <h3 className="font-medium text-xl">Datos del Usuario</h3>
                    <div className="space-y-3 mt-3 text-sm">
                        <div className="">
                            <span className="font-semibold mr-3 block">Nombre</span>
                            {shoppingDetails.user_data.name}
                        </div>
                        <div className="">
                            <span className="font-semibold mr-3 block">Telefono</span>
                            {shoppingDetails.user_data.phone}
                        </div>
                        <div className="">
                            <span className="font-semibold mr-3 block">email</span>
                            {shoppingDetails.user_data.email}
                        </div>

                        <div className="">
                            <span className="font-semibold mr-3 block">Nota</span>
                            {shoppingDetails.note ? shoppingDetails.note : "sin nota"}
                        </div>
                        <div className="">
                            <span className="font-semibold mr-3 block">
                                Fecha de compra:
                            </span>
                            {formatDate(shoppingDetails.created_at)}
                        </div>
                    </div>
                </div>
                <div>
                    <h3 className="font-medium text-xl">Datos del Evento</h3>
                    <div className="space-y-2 mt-3 text-sm">
                        <div className="">
                            <span className="font-semibold mr-3 block">Nombre del Evento</span>
                            {shoppingDetails.event_data.title}
                        </div>
                        <div className="">
                            <span className="font-semibold mr-3 block">Duracion</span>
                            {shoppingDetails.event_data.duration}
                        </div>
                        <div className="">
                            <span className="font-semibold mr-3 block">Direccion</span>
                            {/* <div>{shoppingDetails.event_data.location.name}</div> */}
                            {/* <div>{shoppingDetails.event_data.location.address}</div> */}
                        </div>
                        <div className="">
                            <span className="font-semibold mr-3 block">Fecha del evento</span>
                            {formatDate(shoppingDetails.session)}
                        </div>
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
                        {shoppingDetails.tickets.map((item, index) => (
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
                                {formatCurrency(shoppingDetails.sub_total)}
                            </td>
                        </tr>

                        {shoppingDetails.promotion && (
                            <tr className="font-semibold italic">
                                <td className="p-3 ">Promocion</td>
                                <td className="p-3">
                                    -{formatCurrency(shoppingDetails.promocion.applied)}
                                </td>
                            </tr>
                        )}

                        <tr className="font-semibold italic">
                            <td className="p-3 ">Tarifa {shoppingDetails.fee_porcent}</td>
                            <td className="p-3">
                                {formatCurrency(shoppingDetails.fee)}
                            </td>
                        </tr>
                        <tr className="font-bold  text-xl">
                            <td className="p-3 ">Total</td>
                            <td className="p-3">
                                {formatCurrency(shoppingDetails.total)}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </MyAccount>
    );
};

export default ShoppingDetails;
