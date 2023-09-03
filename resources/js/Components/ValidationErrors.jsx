import { XCircleIcon } from '@heroicons/react/24/solid';


export default function ValidationErrors({ errors }) {

	return (
		Object.keys(errors).length > 0 && (
			<div id="error-message" className="text-red-100 bg-red-500 p-2 md:p-4 space-x-3 rounded-md ">
				<div className='flex items-start gap-4'>
					<div>
						<XCircleIcon className="h-5 w-5 mt-1" />
					</div>
					<div>
						<div className="font-medium">

							<span>¡Vaya! Algo salió mal.</span>
						</div>

						<ul className=" list-disc list-inside text-sm">
							{Object.keys(errors).map(function (key, index) {
								return <li key={index}>{errors[key]}</li>;
							})}
						</ul>
					</div>
				</div>
			</div>
		)
	);
}
