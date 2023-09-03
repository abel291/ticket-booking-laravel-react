import { formatCurrency } from '@/Helpers/Helpers'
import React from 'react'

function OrderTotalPrice({ order }) {
    return (
        <div className="mt-8 flex sm:justify-end  pr-3">
            <div className="sm:text-right">

                <div className="space-y-4">
                    <dl className="grid sm:grid-cols-5 gap-x-3 ">
                        <dt className="col-span-3 text-gray-500">Sub total:</dt>
                        <dd className="whitespace-nowrap col-span-2 font-medium  dark:text-gray-200">{formatCurrency(order.sub_total)}</dd>
                    </dl>
                    {order.data.promotion && (
                        <dl className="grid sm:grid-cols-5 gap-x-3 ">
                            <dt className="col-span-3 text-gray-500">Promocion {order.data.promotion.value}%:</dt>
                            <dd className="whitespace-nowrap col-span-2 font-medium text-green-500 dark:text-gray-200">
                                -{formatCurrency(order.data.promotion.applied)}
                            </dd>
                        </dl>
                    )}

                    <dl className="grid sm:grid-cols-5 gap-x-3 ">
                        <dt className="col-span-3 text-gray-500">Estimación de impuestos  {order.fee_porcent}:</dt>
                        <dd className="whitespace-nowrap col-span-2 font-medium  dark:text-gray-200">{formatCurrency(order.fee)}</dd>
                    </dl>

                    <dl className="grid sm:grid-cols-5 gap-x-3 ">
                        <dt className="col-span-3 text-gray-500">Total:</dt>
                        <dd className="whitespace-nowrap col-span-2 font-bold  dark:text-gray-200">{formatCurrency(order.total)}</dd>
                    </dl>

                </div>
                {/* End Grid */}
            </div>
        </div>
    )
}

export default OrderTotalPrice
