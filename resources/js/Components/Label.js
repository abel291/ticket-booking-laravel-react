import React from 'react';

export default function Label({ forInput, value, className, children }) {
    return (
        <label htmlFor={forInput} className={`block font-light text-sm text-white  ` + className}>
            {value ? value : children}
        </label>
    );
}
