import React from 'react';

export default function Label({ forInput, value, className, children }) {
    return (
        <label htmlFor={forInput} className={`block text-sm font-medium leading-6 text-gray-900  ` + className}>
            {value ? value : children}
        </label>
    );
}
