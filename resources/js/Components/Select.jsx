import React from "react";

const Select = ({
    children,
    name,
    value,
    className = "",
    required,
    handleChange = () => { },
}) => {
    return (
        <select

            name={name}
            value={value}
            className={
                `select-form ` +
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
