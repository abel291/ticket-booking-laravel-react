import ApplicationLogo from "@/Components/ApplicationLogo";
import Section from "@/Components/Section";

import { Link } from "@inertiajs/inertia-react";
import React from "react";
import { FaFacebookF, FaTwitter, FaGoogle } from "react-icons/fa";
import Newsletter from "./Newsletter";

const Footer = () => {
    return (
        <div className="bg-dark-blue-700">
            <Section>
                <div className="container relative z-10">
                    <Newsletter />
                </div>
            </Section>
            <div className="">
                <div className="container">
                    <div>
                        <div className="flex items-center justify-between gap-3 border-b border-dark-blue-400  pb-6">
                            <div className="">
                                <ApplicationLogo className="text-3xl text-white" />
                            </div>
                            <div className="flex items-center gap-3">
                                <a
                                    href="google.com"
                                    target="_blank"
                                    className="rounded-full bg-white p-2 transition duration-150 hover:bg-emerald-400"
                                >
                                    <FaFacebookF className="h-4 w-4  text-dark-blue-700 " />
                                </a>
                                <a
                                    href="google.com"
                                    target="_blank"
                                    className="rounded-full bg-white p-2 transition duration-150 hover:bg-emerald-400"
                                >
                                    <FaTwitter className="h-4 w-4  text-dark-blue-700 " />
                                </a>
                                <a
                                    href="google.com"
                                    target="_blank"
                                    className="rounded-full bg-white p-2 transition duration-150 hover:bg-emerald-400"
                                >
                                    <FaGoogle className="h-4 w-4  text-dark-blue-700 " />
                                </a>
                            </div>
                        </div>
                        <div className="flex flex-col justify-between gap-3 py-6 text-sm font-medium lg:flex-row lg:items-center">
                            <div className="grow">
                                <p>
                                    Copyright © 2020.All Rights Reserved By{" "}
                                    <Link
                                        href={route("home")}
                                        className="text-emerald-400"
                                    >
                                        MyTicket
                                    </Link>
                                </p>
                            </div>

                            <Link
                                href={route("about-us")}
                                className="hover:text-emerald-400"
                            >
                                Sobre nosotros
                            </Link>
                            <Link
                                href={route("home")}
                                className="hover:text-emerald-400"
                            >
                                Condiciones de uso
                            </Link>
                            <Link
                                href={route("home")}
                                className="hover:text-emerald-400"
                            >
                                Política de privacidad
                            </Link>
                            <Link
                                href={route("home")}
                                className="hover:text-emerald-400"
                            >
                                FAQ
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default Footer;
