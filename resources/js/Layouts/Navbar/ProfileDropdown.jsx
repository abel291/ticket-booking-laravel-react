import Dropdown from "@/Components/Dropdown"
import { Menu, Transition } from "@headlessui/react"
import { AdjustmentsHorizontalIcon, ArrowLeftOnRectangleIcon, ArrowRightOnRectangleIcon, ShoppingBagIcon, UserCircleIcon } from "@heroicons/react/24/outline"
import { CalendarDaysIcon, ChevronDownIcon } from "@heroicons/react/24/solid"

import { Link, usePage } from "@inertiajs/react"
import { Fragment } from "react"


export default function ProfileDropdown({ children }) {

    const { auth } = usePage().props
    return (
        <>
            {auth.user ? (
                <Dropdown >
                    <Dropdown.Trigger>
                        <button className="hidden lg:flex  items-center rounded-md text-sm font-semibold">
                            <span className="text-base font-bold uppercase">{auth.user.name}</span>
                            <ChevronDownIcon className="w-5 h-5 ml-1 -mr-1  " aria-hidden="true" />
                        </button>
                        <button className="lg:hidden flex text-sm focus:outline-none focus:ring-2 focus:ring-primary-700 rounded-md focus:ring-offset-2">
                            <span className="sr-only">Open user menu</span>
                            <UserCircleIcon className="h-8 w-8 text-white" />
                        </button>
                    </Dropdown.Trigger>
                    <Dropdown.Content width="w-64" >
                        <>
                            <Dropdown.Link href={route('profile.my_account')} method="get"  >
                                <div className="flex items-center ">
                                    <UserCircleIcon className="h-5 w-5 mr-2 text-primary-600" />
                                    <span>Perfil</span>
                                </div>
                            </Dropdown.Link>
                            <Dropdown.Link href={route('profile.my_orders')} method="get"  >
                                <div className="flex items-center ">
                                    <ShoppingBagIcon className="h-5 w-5 mr-2 text-primary-600" />
                                    <span>Mis Compras</span>
                                </div>
                            </Dropdown.Link>
                            <a className="dropdown-link" target='_blank' href={route('dashboard.home')}  >
                                <div className="flex items-center">
                                    <AdjustmentsHorizontalIcon className="h-5 w-5 mr-2 text-primary-600" />
                                    <span>Dashboard</span>
                                </div>
                            </a>
                            {/* {(auth.user.role == 'super-admin') && (

                                <a className="dropdown-link" target='_blank' href={route('dashboard.home')}  >
                                    <div className="flex items-center">
                                        <AdjustmentsHorizontalIcon className="h-5 w-5 mr-2 text-primary-600" />
                                        <span>Dashboard</span>
                                    </div>
                                </a>
                            )} */}

                            <div className=' border-t border-gray-100'>
                                <Dropdown.Link href={route('logout')} as='button' >
                                    Cerrar sesión
                                </Dropdown.Link>
                            </div>
                        </>

                    </Dropdown.Content>
                </Dropdown >
            ) : (
                <Link href={route("login")} className="btn border border-white lg:border-none btn-primary ">
                    <span>
                        ÚNETE
                    </span>
                </Link>
            )}

        </>
    )
}
