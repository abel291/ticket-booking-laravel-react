import React from "react";
import { Transition } from '@headlessui/react';
import { Fragment } from 'react'
const ItemsLoading = ({ children, loading }) => {
	return (
		<div className="relative">
			{children}
			<Transition
				as={Fragment}
				show={loading}
				enter="transition duration-300"
				enterFrom="opacity-0 "
				enterTo="opacity-100"
				leave="transition duration-300"
				leaveFrom="opacity-100 "
				leaveTo="opacity-0">
				<div className="absolute inset-0 bg-primary-400/50 backdrop-filter backdrop-blur-sm"></div>
			</Transition >
		</div>



	);
};

export default ItemsLoading;
