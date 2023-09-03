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
                        <button className=" flex  items-center rounded-md px-3 py-2 text-sm font-semibold">
                            <span className="">{auth.user.name}</span>
                            <ChevronDownIcon className="w-5 h-5 ml-1 -mr-1  " aria-hidden="true" />
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
                            {/* {(auth.user.role == 'admin') ? (

                                <a className="dropdown-link" href={route('dashboard.events')}  >
                                    <div className="flex items-center ">
                                        <AdjustmentsHorizontalIcon className="h-5 w-5 mr-2 text-primary-600 " />
                                        <span>Administrador de eventos</span>
                                    </div>
                                </a>
                            ) : (
                                <a className="dropdown-link" href={route('manager.events.index')}  >
                                    <div className="flex items-center ">
                                        <AdjustmentsHorizontalIcon className="h-5 w-5 mr-2  text-primary-600" />
                                        <span>Administrador de eventos</span>
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
                <Link href={route("login")} className="btn btn-primary">
                    <span>
                        ÚNETE
                    </span>
                </Link>
            )}

        </>
    )
}
