import React, { useEffect, useRef } from "react";

export default function Input({
    type = "text",
    name,
    value = "",
    className,
    isFocused,
    handleChange = () => { },
    ...props
}) {
    const input = useRef();

    useEffect(() => {
        if (isFocused) {
            input.current.focus();
        }
    }, []);

    return (
        <div className="flex flex-col items-start ">
            <input
                type={type}
                name={name}
                value={value}
                className={
                    `input-form  ` +
                    className
                }
                ref={input}
                onChange={handleChange}
                {...props}
            />
        </div>
    );
}
