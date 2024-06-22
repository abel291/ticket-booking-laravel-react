import React from "react";

const ListDescription = ({ title, children }) => {
    return (
        <dl>
            <dt className="text-xs font-medium text-primary-500">{title}</dt>
            <dd className="text-sm font-medium block">{children}</dd>
        </dl>
    );
};

export default ListDescription;
