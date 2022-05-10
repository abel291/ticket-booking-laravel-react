import ApplicationLogo from "@/Components/ApplicationLogo";
import Dropdown from "@/Components/Dropdown";
import NavLink from "@/Components/NavLink";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink";
import { Link, usePage } from "@inertiajs/inertia-react";
import React, { useEffect, useRef, useState } from "react";
import { FaChevronDown, FaBars, FaWindowClose } from "react-icons/fa";

const Navbar = () => {
    const { auth } = usePage().props;
    let links = [
        {
            title: "Inicio",
            path: route("home"),
            current: route().current("home"),
        },

        {
            title: "Peliculas",
            path: route("movies"),
            current: route().current("movies"),
        },

        {
            title: "Eventos",
            path: route("events"),
            current: route().current("events"),
        },

        {
            title: "Deportes",
            path: route("sports"),
            current: route().current("sports"),
        },

        {
            title: "Acerca",
            path: route("about-us"),
            current: route().current("about-us"),
        },

        {
            title: "Contactenos",
            path: route("checkout"),
            current: route().current("checkout"),
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
                "fixed inset-x-0 z-20 bg-dark-blue-700 transition" +
                (isTopScroll === true
                    ? " lg:border-b lg:border-white lg:border-opacity-20 lg:bg-transparent"
                    : " shadow lg:bg-dark-blue-700")
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
                        {links.map((item, key) => (
                            <Link key={key} href={item.path}>
                                {item.title}
                            </Link>
                        ))}

                        {auth.user ? (
                            <div className="flex items-center ">
                                <div className="relative">
                                    <Dropdown>
                                        <Dropdown.Trigger>
                                            <button
                                                type="button"
                                                className="btn"
                                            >
                                                <div className="flex items-center">
                                                    <span className="inline-flex items-center rounded-md ">
                                                        {auth.user.name}
                                                    </span>
                                                    <FaChevronDown className="ml-3 h-4 w-4" />
                                                </div>
                                            </button>
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
                        ) : (
                            <Link href={route("login")} className="btn">
                                ÚNETE
                            </Link>
                        )}
                    </div>

                    <div className="-mr-2 flex items-center lg:hidden">
                        <button
                            onClick={() =>
                                setShowingNavigationDropdown(
                                    (previousState) => !previousState
                                )
                            }
                            className="inline-flex items-center justify-center rounded-md p-2 text-white transition duration-150 ease-in-out"
                        >
                            {showingNavigationDropdown ? (
                                <FaWindowClose className="h-6 w-6" />
                            ) : (
                                <FaBars className="h-6 w-6" />
                            )}
                        </button>
                    </div>
                </div>
            </div>

            <div
                className={
                    "text-white lg:hidden " +
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
