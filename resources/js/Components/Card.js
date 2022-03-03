import React from "react";

const Card = ({ children, title }) => {
    return (
        <div className="bg-dark-blue-700 p-7">
            <h5 className="font-medium">{title}</h5>
            <div className="mt-6">{children}</div>
        </div>
    );
};

export default Card;
