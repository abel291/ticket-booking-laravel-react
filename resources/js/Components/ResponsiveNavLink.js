import React from 'react';
import { Link } from '@inertiajs/inertia-react';

export default function ResponsiveNavLink({ method = 'get', as = 'a', href, active = false, children }) {
    return (
        <Link
            method={method}
            as={as}
            href={href}
            className={`w-full flex items-start px-4 py-2 border-l-4 text-white ${
                active

                    ? 'border-emerald-400  bg-dark-blue-400 focus:outline-none focus:text-white focus:bg-dark-blue-500 focus:border-emerald-700'


                    : 'border-transparent hover:bg-dark-blue-500'
            } text-base font-medium focus:outline-none transition duration-150 ease-in-out`}
        >
            {children}
        </Link>
    );
}
