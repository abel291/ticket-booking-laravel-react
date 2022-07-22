import { XCircleIcon, XIcon } from '@heroicons/react/solid';
import { usePage } from '@inertiajs/inertia-react';
import React, { useEffect } from 'react'
import toast, { Toaster } from 'react-hot-toast';
const NotificationToast = () => {
	const {errors}=usePage().props
	//const errors = { 1: 1 }


	useEffect(() => {

		Object.keys(errors).length > 0 && toast.custom((t) => (
			<div id="error-message" className="text-red-100 bg-red-500 p-2 md:p-4 space-x-3 rounded-md ">
				<div className='flex items-start gap-4'>
					<div>
						<XCircleIcon className="h-5 w-5 mt-1" />
					</div>
					<div className='grow'>
						<div className="font-medium">

							<span>¡Vaya! Algo salió mal.</span>
						</div>

						<ul className=" list-disc list-inside text-sm">
							{Object.keys(errors).map(function (key, index) {
								return <li key={index}>{errors[key]}</li>;
							})}
						</ul>
					</div>
					<div>
						<button
							onClick={() => toast.dismiss(t.id)}
							className="text-xs text-white"
						>
							<XIcon className="h-5 w-5 mt-1" />
						</button>
					</div>
				</div>
			</div>))
	}, [errors])

	return (

		<Toaster />

	)
}

export default NotificationToast