import React from 'react'
import Label from '@/Components/Label'
import InputError from '@/Components/InputError'
const TextAreaLabelError = ({ label = "", value, name, errors = null, className, handleChange, ...props }) => {
    return (
        <div>
            <Label forInput={name} value={label} />
            <textarea
                required
                name={name}
                value={value}
                className={"mt-1 input-textarea block w-full " + className}
                onChange={handleChange}
                {...props}
            />
            <InputError message={errors} className="mt-2" />
        </div>
    )
}

export default TextAreaLabelError
