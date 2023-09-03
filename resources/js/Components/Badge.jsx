import React from 'react'

const Badge = ({ color = 'gray', children, className }) => {

    const colors = {
        gray: 'bg-gray-50 text-gray-600 ring-1 ring-inset ring-gray-500/10',
        red: 'bg-red-50 text-red-700 ring-1 ring-inset ring-red-600/10',
        yellow: 'bg-yellow-50 text-yellow-800 ring-1 ring-inset ring-yellow-600/20',
        green: 'bg-green-50 text-green-700 ring-1 ring-inset ring-green-600/20',
        blue: 'bg-blue-50 text-blue-700 ring-1 ring-inset ring-blue-700/10',
        indigo: 'bg-indigo-50 text-indigo-700 ring-1 ring-inset ring-indigo-700/10',
        purple: 'bg-purple-50 text-purple-700 ring-1 ring-inset ring-purple-700/10',
        pink: 'bg-pink-50 text-pink-700 ring-1 ring-inset ring-pink-700/10',
        orange: 'bg-orange-50 text-orange-700 ring-1 ring-inset ring-orange-700/10',
    };
    return (
        <span className={`inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ${colors[color]} ${className}`}>{children}</span>
    )
}

export default Badge

