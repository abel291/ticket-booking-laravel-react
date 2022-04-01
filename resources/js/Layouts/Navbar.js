import ApplicationLogo from "@/Components/ApplicationLogo";
import Dropdown from "@/Components/Dropdown";
import NavLink from "@/Components/NavLink";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink";
import { Link, usePage } from "@inertiajs/inertia-react";
import React, { useEffect, useRef, useState } from "react";

const Navbar = () => {
    const { auth } = usePage().props;
    const [showingNavigationDropdown, setShowingNavigationDropdown] =
        useState(false);
    //const scrollRef = useRef();
    const [isTopScroll, setIsTopScroll] = useState(true);

    const handleScroll = () => {
        let scroll = window.scrollY;

        if (scroll <= 10) {
            setIsTopScroll(true);
        }

        if (scroll > 10 && isTopScroll === true) {
            setIsTopScroll(false);
        }
    };

    useEffect(() => {
        window.addEventListener("scroll", handleScroll);
        return () => {
            window.removeEventListener("scroll");
        };
    }, []);

    return (
        <nav
            className={
                "fixed inset-x-0 z-20  transition" +
                (isTopScroll === true
                    ? " border-b border-white border-opacity-20 bg-transparent"
                    : " bg-dark-blue-700 shadow")
            }

            //ref={scrollRef}
        >
            <div className="container">
                <div className="flex h-20 items-center justify-between lg:h-24">
                    <div className="flex items-center">
                        <Link href="/">
                            <ApplicationLogo className="text-3xl text-white" />
                        </Link>
                    </div>

                    <div className="hidden items-center gap-4 font-bold uppercase text-white lg:flex ">
                        <Link href={route("home")}>Home</Link>
                        <Link href={route("movies")}>Peliculas</Link>
                        <Link href={route("movie-details")}>Eventos</Link>
                        <Link href={route("select-ticket")}>Deportes</Link>
                        <Link href={route("about-us")}>Acerca de</Link>
                        <Link href={route("checkout")}>Contactenos</Link>
                        <div className="flex items-center ">
                            <div className="relative">
                                <Dropdown>
                                    <Dropdown.Trigger>
                                        {auth.user ? (
                                            <span className="inline-flex rounded-md">
                                                <button
                                                    type="button"
                                                    className="inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none"
                                                >
                                                    {auth.user.name}

                                                    <svg
                                                        className="ml-2 -mr-0.5 h-4 w-4"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20"
                                                        fill="currentColor"
                                                    >
                                                        <path
                                                            fillRule="evenodd"
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                            clipRule="evenodd"
                                                        />
                                                    </svg>
                                                </button>
                                            </span>
                                        ) : (
                                            <Link className="btn">ÚNETE</Link>
                                        )}
                                    </Dropdown.Trigger>

                                    <Dropdown.Content>
                                        <Dropdown.Link
                                            href={route("logout")}
                                            method="post"
                                            as="button"
                                        >
                                            Log Out
                                        </Dropdown.Link>
                                    </Dropdown.Content>
                                </Dropdown>
                            </div>
                        </div>
                    </div>

                    <div className="-mr-2 flex items-center lg:hidden">
                        <button
                            onClick={() =>
                                setShowingNavigationDropdown(
                                    (previousState) => !previousState
                                )
                            }
                            className="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none"
                        >
                            <svg
                                className="h-6 w-6"
                                stroke="currentColor"
                                fill="none"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    className={
                                        !showingNavigationDropdown
                                            ? "inline-flex"
                                            : "hidden"
                                    }
                                    strokeLinecap="round"
                                    strokeLinejoin="round"
                                    strokeWidth="2"
                                    d="M4 6h16M4 12h16M4 18h16"
                                />
                                <path
                                    className={
                                        showingNavigationDropdown
                                            ? "inline-flex"
                                            : "hidden"
                                    }
                                    strokeLinecap="round"
                                    strokeLinejoin="round"
                                    strokeWidth="2"
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div
                className={
                    (showingNavigationDropdown ? "block" : "hidden") +
                    " lg:hidden"
                }
            >
                <div className="space-y-1 pt-2 pb-3">
                    <ResponsiveNavLink
                        href={route("dashboard.home")}
                        active={route().current("dashboard.home")}
                    >
                        Admin
                    </ResponsiveNavLink>
                </div>

                <div className="border-t border-gray-200 pt-4 pb-1">
                    {/* <div className="px-4">
                        <div className="font-medium text-base text-gray-800">
                            {auth.user.name}
                        </div>
                        <div className="font-medium text-sm text-gray-500">
                            {auth.user.email}
                        </div>
                    </div> */}

                    <div className="mt-3 space-y-1">
                        <ResponsiveNavLink
                            method="post"
                            href={route("logout")}
                            as="button"
                        >
                            Log Out
                        </ResponsiveNavLink>
                    </div>
                </div>
            </div>
        </nav>
    );
};

export default Navbar;
