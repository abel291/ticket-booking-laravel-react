import React from 'react'
import Input from '@/Components/Input'
import Label from '@/Components/Label'
import InputError from '@/Components/InputError'

const InputPriceLabelError = ({ label = "", value, name, errors = null, className, ...props }) => {
    return (
        <div>
            <Label forInput={name} value={label} />
            <div className="relative mt-1 rounded-md shadow-sm">
                <div className="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <span className="text-gray-500 sm:text-sm">$</span>
                </div>
                <Input className="border-0 pl-7" placeholder="0.00"
                    name={name}
                    value={value}
                    {...props} />
            </div>
            <InputError message={errors} className="mt-2" />
        </div>
    )
}

export default InputPriceLabelError
