import React from 'react'
import { Disclosure, Transition } from "@headlessui/react";
import Card from './Card';
import { ArrowDownCircleIcon } from '@heroicons/react/24/solid';
import { ChevronDownIcon } from '@heroicons/react/24/solid';

const FrequentlyAsked = ({ question, children }) => {
    return (
        <Disclosure>
            {({ open }) => (
                <Card>
                    <Disclosure.Button className="w-full">
                        <div className="flex items-center justify-between ">
                            <h6 className="font-semibold w-full text-left">{question}</h6>
                            <ChevronDownIcon
                                className={`${open ? "rotate-180 transform" : ""
                                    } ml-10 h-7 w-7 text-primary-500 transition`}
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
                        <Disclosure.Panel className="mt-5  ">
                            {children}
                        </Disclosure.Panel>
                    </Transition>
                </Card>
            )}
        </Disclosure>
    );
};

export default FrequentlyAsked
