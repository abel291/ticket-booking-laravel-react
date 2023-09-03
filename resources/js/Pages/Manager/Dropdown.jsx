import { Menu, Transition } from '@headlessui/react'
import { Fragment, useEffect, useRef, useState } from 'react'
import { ChevronDownIcon } from '@heroicons/react/20/solid'
import { Link } from '@inertiajs/react'

const Dropdown = ({ children }) => {
    return (
        <Menu as="div" className=" inline-block text-left">
            {children}
        </Menu>
    )
}

const Trigger = ({ className, children }) => {

    return (
        <div>
            <Menu.Button className={className}>
                {children}
            </Menu.Button>
        </div>
    );
};

const Content = ({ align = 'right', width = 'w-48', children }) => {

    let alignmentClasses = 'origin-top';

    if (align === 'left') {
        alignmentClasses = 'origin-top-left left-0';
    } else if (align === 'right') {
        alignmentClasses = 'origin-top-right right-0';
    }

    let widthClasses = width;

    return (
        <Transition
            as={Fragment}
            enter="transition ease-out duration-100"
            enterFrom="transform opacity-0 scale-95"
            enterTo="transform opacity-100 scale-100"
            leave="transition ease-in duration-75"
            leaveFrom="transform opacity-100 scale-100"
            leaveTo="transform opacity-0 scale-95"
        >
            <div className="relative">
                <Menu.Items className={`absolute right-0 mt-2 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none ${alignmentClasses} ${widthClasses}`}>
                    {children}
                </Menu.Items>
            </div>
        </Transition>


    );
};
const DropdownLink = ({ href, method = 'post', as = 'a', children }) => {
    return (
        <Menu.Item>
            <Link
                href={href}
                method={method}
                as={as}
                className="block w-full px-4 py-2.5 text-left  leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-dark-blue-700 transition duration-150 ease-in-out"
            >
                {children}
            </Link>
        </Menu.Item>

    );
};

Dropdown.Trigger = Trigger;
Dropdown.Content = Content;
Dropdown.Link = DropdownLink;

export default Dropdown;


