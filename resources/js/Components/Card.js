import React from "react";

const Card = ({ children, title, className = "" }) => {
    return (
        <div className={"rounded bg-dark-blue-700 p-7 " + className}>
            <h6 className="font-medium">{title}</h6>
            <div className="my-3 border-t border-dashed  border-dark-blue-400"></div>
            <div >{children}</div>
        </div>
    );
};

export default Card;
