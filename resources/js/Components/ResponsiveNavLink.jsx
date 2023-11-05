import React from 'react';
import { Link } from '@inertiajs/react';

export default function ResponsiveNavLink({ method = 'get', as = 'a', href, active = false, children }) {
	return (
		<Link
			method={method}
			as={as}
			href={href}
			className={`w-full flex items-start px-4 py-2 border-l-4 text-white ${active

				? 'border-primary-400  focus:outline-none focus:text-white focus:bg-primary-500 focus:border-primary-700'


				: 'border-transparent hover:bg-primary-500'
				} text-base font-medium focus:outline-none transition duration-150 ease-in-out`}
		>
			{children}
		</Link>
	);
}
