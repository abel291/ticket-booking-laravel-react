import React from 'react'
import Label from '@/Components/Label'
import Input from '@/Components/Input'
import InputError from '@/Components/InputError'

const InputLabelError = ({ label = "", value, name, errors = null, className, handleChange, ...props }) => {
    return (
        <div>
            <Label forInput={name} value={label} />
            <Input
                required
                name={name}
                value={value}
                className={"mt-1 block w-full " + className}
                handleChange={handleChange}
                {...props}
            />
            <InputError message={errors} className="mt-2" />
        </div>
    )
}

export default InputLabelError
