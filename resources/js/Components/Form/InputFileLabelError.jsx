import React from 'react'
import Button from '../Button'
import { useState } from 'react';
import Label from '@/Components/Label'
import InputError from '@/Components/InputError'

const InputFileLabelError = ({ label = "", name, errors, handleChange, img = null }) => {
    const [selectedFile, setSelectedFile] = useState("Ningún archivo elegido");

    return (
        <>
            <Label>{label}</Label>
            <div className="flex flex-row items-center mt-1">
                <input
                    type="file"
                    id={name}
                    name={name}
                    onChange={(e) => {
                        handleChange(e);
                        setSelectedFile(e.target.files[0].name)
                    }}
                    hidden
                    accept="image/png, image/jpeg,image/jpg"
                />
                <label
                    htmlFor={name}
                    className="btn btn-secondary cursor-pointer"
                >
                    Agregar Imagen
                </label>
                <label className="text-sm text-slate-500 ml-3">{selectedFile}</label>
            </div>
            {img && (
                <img className="w-40 mt-3 rounded" src={img} alt="" />
            )}
            <InputError message={errors} className="mt-2" />
        </>
    )
}

export default InputFileLabelError
