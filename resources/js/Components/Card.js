import React from "react";

const Card = ({ children, title, className = "" }) => {
    return (
        <div className={"rounded border border-dark-blue-500 bg-dark-blue-700 p-6 " + className}>
            <h6 className="font-medium">{title}</h6>
            <div className="my-3 border-t border-dashed  border-dark-blue-500"></div>
            <div >{children}</div>
        </div>
    );
};

export default Card;
