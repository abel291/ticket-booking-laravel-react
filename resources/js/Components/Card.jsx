import React from "react";

const Card = ({ children, title = null, className = "" }) => {
    return (
        <div className={"rounded-md px-6 py-5 bg-white border  " + className}>
            {title && (
                <div className="pb-3 mb-3 border-b border-dashed">
                    <span className="block font-medium text-lg">{title}</span>
                </div>
            )}

            <div >{children}</div>

        </div>
    );
};

export default Card;

