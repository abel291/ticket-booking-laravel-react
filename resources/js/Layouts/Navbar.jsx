import ApplicationLogo from "@/Components/ApplicationLogo";
import Dropdown from "@/Components/Dropdown";
import NavLink from "@/Components/NavLink";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink";
import { Link, usePage } from "@inertiajs/react";
import React, { useEffect, useRef, useState } from "react";
import ProfileDropdown from "./ProfileDropdown";


const Navbar = () => {
    const { auth } = usePage().props;
    let links = [
        {
            title: "Inicio",
            path: route("home"),
            current: route().current("home"),
        },

        {
            title: "Conciertos",
            path: route("events", { categories: ["conciertos"] }),
            current: route().current("events"),
        },

        {
            title: "Turismo",
            path: route("events", { categories: ["turismo"] }),
            current: route().current("events"),
        },

        {
            title: "Festivales",
            path: route("events", { categories: ["festivales"] }),
            current: route().current("events"),
        },

        {
            title: "Acerca",
            path: route("about_us"),
            current: route().current("about_us"),
        },

        {
            title: "Contactenos",
            path: route("home"),
            current: route().current("home"),
        },
    ];
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
            window.removeEventListener("scroll", handleScroll);
        };
    }, []);

    return (
        <nav
            className={
                "fixed inset-x-0 z-20  transition" +
                (isTopScroll === true
                    ? " lg:text-white lg:border-b lg:border-gray-50 lg:border-opacity-20 lg:bg-transparent"
                    : " shadow lg:bg-white")
            }
        // className={" inset-x-0 z-20  transition shadow lg:bg-white"}

        //ref={scrollRef}
        >
            <div className="container">
                <div className="flex  items-center justify-between h-20">
                    <div className="flex items-center">
                        <Link href="/" className={isTopScroll ? "" : "text-primary-500"}>
                            <ApplicationLogo className="text-3xl " />
                        </Link>
                    </div>

                    <div className="flex  gap-x-4 items-center">
                        {links.map((item, key) => (
                            <Link className=" rounded-md text-sm lg:text-base font-bold uppercase" key={key} href={item.path}>
                                {item.title}
                            </Link>
                        ))}

                        <ProfileDropdown />
                    </div>

                    <div className="-mr-2 flex items-center lg:hidden">
                        <button
                            onClick={() =>
                                setShowingNavigationDropdown(
                                    (previousState) => !previousState
                                )
                            }
                            className="inline-flex items-center justify-center rounded-md p-2  transition duration-150 ease-in-out"
                        >
                            {/* {showingNavigationDropdown ? (
                                // <FaWindowClose className="h-6 w-6" />
                            ): (
                                    // <FaBars className="h-6 w-6" />
                                )} */}
                        </button>
                    </div>
                </div>
            </div>

            <div
                className={
                    " lg:hidden " +
                    (showingNavigationDropdown ? "block" : "hidden")
                }
            >
                <div className="mx-auto max-w-3xl space-y-1 py-2">
                    {links.map((item, key) => (
                        <ResponsiveNavLink
                            key={key}
                            href={item.path}
                            active={item.current}
                        >
                            {item.title}
                        </ResponsiveNavLink>
                    ))}
                    {auth.user ? (
                        <div>
                            <div className="flex w-full items-start justify-between ">
                                <div className="w-full px-4 py-2">
                                    {auth.user.name}
                                </div>
                            </div>
                            <div className="border-t border-dark-blue-400">
                                <ResponsiveNavLink
                                    method="post"
                                    href={route("logout")}
                                    as="button"
                                >
                                    Salir
                                </ResponsiveNavLink>
                            </div>
                        </div>
                    ) : (
                        <ResponsiveNavLink href={route("login")}>
                            Unete
                        </ResponsiveNavLink>
                    )}
                </div>
            </div>
        </nav>
    );
};

export default Navbar;
