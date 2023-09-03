import React from "react";

export default function ButtonSecondary({
    type = "button",
    className = "",
    processing = false,
    children,
    disabled = false,
    ...props
}) {

    return (
        <button
            {...props}
            type={type}
            className={"btn btn-secondary relative disabled:opacity-50 " + className}
            disabled={processing || disabled}
        >
            <span>{children}</span>
        </button>
    );
}
