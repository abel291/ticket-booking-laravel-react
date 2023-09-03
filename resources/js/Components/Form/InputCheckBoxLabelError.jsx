import InputError from '@/Components/InputError'
import React from 'react'
import Checkbox from '../Checkbox'

const InputCheckBoxLabelError = ({ label = "", text = null, value, name, errors = null, handleChange }) => {
    return (
        <div className="relative flex gap-x-3">
            <div className="flex h-6 items-center ">
                <Checkbox
                    name={name}
                    defaulvalue={value}
                    checked={value}
                    onChange={handleChange}
                />
            </div>
            <div className="text-sm leading-6">
                <label htmlFor={name} className="font-medium text-gray-900">
                    {label}
                </label>
                {text && (
                    <p className="text-gray-500">{text}</p>
                )}
                {errors && (
                    <InputError message={errors} className="mt-2" />
                )}
            </div>
        </div>
    )
}

export default InputCheckBoxLabelError
