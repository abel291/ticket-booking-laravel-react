import React from "react";

const Select = ({
    children,
    name,
    value,
    className="",
    required,
    handleChange = () => {},
}) => {
    return (
        <select
            
            name={name}
            value={value}
            className={
                `border-r-0 border-l-0 border-t-0 border-b border-white border-opacity-70 bg-inherit ring-0 focus:border-emerald-500 focus:ring-0 ` +
                className
            }
            required={required}
            onChange={(e) => handleChange(e)}
        >
            {children}
        </select>
    );
};

export default Select;
