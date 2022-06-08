import React from 'react'
import { Disclosure, Transition } from "@headlessui/react";
import { FaAngleDown } from "react-icons/fa";
const FrequentlyAsked = ({ question, children }) => {
    return (
        <Disclosure>
            {({ open }) => (
                <div className="w-full rounded-md bg-dark-blue-700 p-6">
                    <Disclosure.Button className="w-full">
                        <div className="flex items-center justify-between">
                            <h6 className="font-semibold">{question}</h6>
                            <FaAngleDown
                                className={`${open ? "rotate-180 transform" : ""
                                    } ml-10 h-10 w-10 text-emerald-400 transition`}
                            />
                        </div>
                    </Disclosure.Button>

                    <Transition
                        enter="transition duration-100 ease-out"
                        enterFrom="transform scale-95 opacity-0"
                        enterTo="transform scale-100 opacity-100"
                        leave="transition duration-75 ease-out"
                        leaveFrom="transform scale-100 opacity-100"
                        leaveTo="transform scale-95 opacity-0"
                    >
                        <Disclosure.Panel className="mt-5 text-sm">
                            {children}
                        </Disclosure.Panel>
                    </Transition>
                </div>
            )}
        </Disclosure>
    );
};

export default FrequentlyAsked