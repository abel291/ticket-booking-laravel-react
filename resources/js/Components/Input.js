import React, { useEffect, useRef } from "react";

export default function Input({
    type = "text",
    name,
    value,
    defaultValue,
    className,
    autoComplete,
    required,
    isFocused,
    placeholder,
    

    handleChange = () => {},
}) {
    const input = useRef();

    useEffect(() => {
        if (isFocused) {
            input.current.focus();
        }
    }, []);

    return (
        <div className="flex flex-col items-start">
            <input
                placeholder={placeholder}
                type={type}
                name={name}
                value={value}
                className={
                    `input  ` +
                    className
                }
                ref={input}
                autoComplete={autoComplete}
                required={required}
                onChange={(e) => handleChange(e)}
            />
        </div>
    );
}
