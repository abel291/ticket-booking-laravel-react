import { CheckIcon, ReceiptRefundIcon, XMarkIcon } from "@heroicons/react/24/solid";
import React from "react";
import Badge from "./Badge";

const OrderStatuBadges = ({ status }) => {
    return (
        <div className="text-xs font-medium">
            {status == "successful" && (
                <Badge color="green">
                    <span>Aprobado</span>
                    <CheckIcon className="ml-1 h-4 w-4" />
                </Badge>
            )}
            {status == "refunded" && (
                <Badge>
                    <span>Reembolsado</span>
                    <ReceiptRefundIcon className="ml-1 h-4 w-4" />
                </Badge>
            )}
            {status == "canceled" && (
                <Badge>
                    <span>Cancelado</span>
                    <XMarkIcon className="ml-1 h-4 w-4" />
                </Badge>
            )}
        </div>
    );
};

export default OrderStatuBadges;
