
import Layout from '@/Layouts/Layout';
import { Link, useForm, usePage } from '@inertiajs/react';
import React from 'react'

export default function Authenticated({ title, navigationRoute = [], children }) {

	const logout = useForm();
	const handleLogout = () => {
		logout.post(route("logout"));
	};

	return (
		<Layout title={title ?? 'Manager'}>
			<div className="container py-section mt-20 lg:mt-24">
				<div className="grid grid-cols-12 md:gap-4 gap-y-10">
					<div className="col-span-12 md:col-span-2">
						<h3 className="text-2xl text-primary-500 font-primary font-medium ">
							Dashboard
						</h3>
						<div className="flex flex-col mt-4">
							{navigationRoute.map((item) => (
								<Link
									key={item.path}
									href={route(item.path)}
									preserveScroll
									className={
										"block py-3 pl-4 border-l-4 font-medium  " +
										(route().current(item.path)
											? "border-primary-500 text-primary-500 "
											: "border-primary-100  hover:border-primary-500 hover:text-primary-500")
									}
								>
									{item.name}
								</Link>
							))}
						</div>
						<div className="mt-6">
							<button
								className="uppercase font-bold rounded  text-primary-500 border border-primary-500 text-sm py-2 px-4 hover:bg-primary-500 hover:text-white disabled:opacity-25 leading-none"
								onClick={handleLogout}
								type="Button"
								disabled={logout.processing}
							>
								Cerrar Sesion
							</button>
						</div>
					</div>
					<div className="col-span-12 md:col-span-10">
						<div>
							<div className="border-b border-gray-900/10 pb-6">
								<h2 className="text-2xl font-semibold">{title}</h2>
							</div>

							<div className="mt-4">
								{children}
							</div>
						</div>
					</div>
				</div>
			</div>
		</Layout>
	);
}
