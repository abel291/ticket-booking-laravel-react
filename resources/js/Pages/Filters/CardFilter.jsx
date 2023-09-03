import React from 'react'

const CardFilter = ({ title, children }) => {
    return (
        <div className='border-t border-gray-200 py-6  '>
            <span className="font-medium text-gray-900">
                {title}
            </span>
            <div className="mt-4">
                {children}
            </div>
        </div>
    )
}

export default CardFilter
