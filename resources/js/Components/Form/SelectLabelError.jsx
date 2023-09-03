import React from 'react'
import Label from '@/Components/Label'
import Input from '@/Components/Input'
import InputError from '@/Components/InputError'
import Select from '@/Components/Select'
const SelectLabelError = ({ label = "", value, name, errors = null, className, children, ...props }) => {
    return (
        <div>
            <Label forInput={name} value={label} />
            <Select
                required
                name={name}
                value={value}
                className={"mt-1 block w-full" + className}
                {...props}
            >
                {children}

            </Select>
            <InputError message={errors} className="mt-2" />
        </div>
    )
}

export default SelectLabelError
