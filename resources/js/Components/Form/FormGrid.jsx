import React from 'react'

const FormGrid = ({ children, className }) => {
    return (
        <div className={"grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6" + " " + className}>{children}</div>
    )
}

export default FormGrid
