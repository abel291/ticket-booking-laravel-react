import React from "react";

const Card = ({ children, title, className = "" }) => {
    return (
        <div className={"rounded bg-dark-blue-700 p-7 " + className}>
            <h6 className="font-medium">{title}</h6>
            <div className="mt-6">{children}</div>
        </div>
    );
};

export default Card;
