import React from "react";

const OrderStatuBadges = ({ status }) => {
    return (
        <div className="text-xs font-medium">
            {status == "successful" && (
                <div className="inline-flex items-center rounded-lg  bg-green-600 px-2 leading-5 text-green-100  ">
                    <span>aprobado</span>
                </div>
            )}
            {status == "refunded" && (
                <div className="inline-flex items-center rounded-lg  bg-red-600 px-2 leading-5 text-red-100  ">
                    <span>reembolsado</span>
                </div>
            )}
            {status == "canceled" && (
                <div className="inline-flex items-center rounded-lg  bg-gray-600 px-2 leading-5 text-gray-100  ">
                    <span>cancelado</span>
                </div>
            )}
        </div>
    );
};

export default OrderStatuBadges;
