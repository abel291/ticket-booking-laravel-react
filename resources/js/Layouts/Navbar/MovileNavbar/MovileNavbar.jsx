import { Fragment } from 'react'
import { Disclosure, Menu, Transition } from '@headlessui/react'

import { Link, usePage } from '@inertiajs/react'
import ApplicationLogo from '@/Components/ApplicationLogo'
import ProfileDropdown from '../ProfileDropdown';

import MobileMenuButton from './MobileMenuButton'
import { UserCircleIcon } from '@heroicons/react/24/outline';

const navigation_profile = [
    { name: 'Perfil', href: route('profile.my_account'), current: route().current('profile.my_account') },
    { name: 'Ordenes', href: route('profile.my_orders'), current: route().current('profile.my_orders') },

]

const navigation_sing = [
    { name: 'Acceder ', href: route('login'), current: route().current('login') },
    { name: 'Crear cuenta', href: route('register'), current: route().current('register') },
]

function classNames(...classes) {
    return classes.filter(Boolean).join(' ')
}

export default function MovileNavbar({ navigation }) {
    const { auth } = usePage().props

    return (
        <Disclosure as="nav" className="shadow text-white lg:hidden bg-primary-600">
            {({ open }) => (
                <>
                    <div className="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                        <div className="relative flex h-16 items-center justify-between">

                            <div className="absolute inset-y-0 left-0 flex items-center">
                                <MobileMenuButton open={open} />
                            </div>
                            <div className="flex flex-1 items-center justify-center ">
                                <div className="flex flex-shrink-0 items-center">
                                    <ApplicationLogo className="text-xl" />
                                </div>
                            </div>
                            <div className="absolute inset-y-0 right-0 flex items-center pr-2 z-50">
                                <ProfileDropdown />
                            </div>
                        </div>
                    </div>

                    <Disclosure.Panel >
                        <>
                            <div className="space-y-1 px-2 pb-3 pt-2">
                                {navigation.map((item) => (
                                    <Link key={item.path} href={item.path}
                                        className={"block rounded-md px-3 py-2 text-base font-medium " +
                                            classNames(

                                                item.current ? 'bg-primary-700' : ' hover:bg-primary-700 ',
                                                ''
                                            )}
                                        aria-current={item.current ? 'page' : undefined}
                                    >
                                        {item.title}
                                    </Link>
                                ))}
                            </div>
                            <div className="border-t border-primary-700/40  pb-3 pt-4">
                                {auth.user ? (
                                    <>
                                        <div className="flex items-center px-5">
                                            <div >
                                                <div className="text-base font-medium leading-none text-white">{auth.user.name}</div>
                                                <div className="text-sm font-medium leading-none text-primary-300 mt-2">{auth.user.email}</div>
                                            </div>
                                        </div>
                                        <div className="mt-3 space-y-1 px-2">
                                            {navigation_profile.map((item) => (
                                                <Link
                                                    key={item.name}
                                                    href={item.href}
                                                    className={"block rounded-md px-3 py-2 text-base font-medium " + classNames(
                                                        item.current ? 'bg-primary-700' : ' hover:bg-primary-500 ',
                                                        ''
                                                    )}
                                                    aria-current={item.current ? 'page' : undefined}
                                                >
                                                    {item.name}
                                                </Link>
                                            ))}
                                            <Link
                                                key="logout"
                                                method="post" href={route('logout')}
                                                as="button"
                                                className="w-full text-left block rounded-md px-3 py-2 text-base font-medium hover:bg-primary-500"
                                            >
                                                Cerrar sesión
                                            </Link>
                                        </div>
                                    </>
                                ) : (
                                    <div className=" space-y-1 px-2">
                                        {navigation_sing.map((item) => (
                                            <Link
                                                key={item.name}
                                                href={item.href}
                                                className={"block rounded-md px-3 py-2 text-base font-medium " + classNames(
                                                    item.current ? 'bg-primary-700' : ' hover:bg-primary-500 ',
                                                    ''
                                                )}
                                                aria-current={item.current ? 'page' : undefined}
                                            >
                                                {item.name}
                                            </Link>
                                        ))}

                                    </div>
                                )}
                            </div>
                        </>

                    </Disclosure.Panel>
                </>
            )
            }
        </Disclosure >
    )
}
