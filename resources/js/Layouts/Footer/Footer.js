import ApplicationLogo from "@/Components/ApplicationLogo";
import { ArrowCircleDownIcon } from "@heroicons/react/solid";
import { Link } from "@inertiajs/inertia-react";
import React from "react";
import { FaFacebookF, FaTwitter, FaGoogle } from "react-icons/fa";
import Newsletter from "./Newsletter";

const Footer = () => {
    return (
        <>
            <div className="relative ">
                <div className="container relative z-10">
                    <Newsletter />
                </div>
                <div className="absolute bottom-0 w-full ">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 1440 320"
                    >
                        <path
                            fill="#032055"
                            fillOpacity="1"
                            d="M0,64L80,80C160,96,320,128,480,122.7C640,117,800,75,960,53.3C1120,32,1280,32,1360,32L1440,32L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"
                        ></path>
                    </svg>
                </div>
            </div>
            <div className="bg-dark-blue-500 pt-20 lg:pt-24 xl:pt-32">
                <div className="container">
                    <div>
                        <div className="flex justify-between gap-3 border-b border-dark-blue-400 pb-6  items-center">
                            <div className="">
                                <ApplicationLogo className="text-3xl text-white" />
                            </div>
                            <div className="flex items-center gap-3">
                                <a
                                    href="google.com"
                                    target="_blank"
                                    className="rounded-full bg-white p-2 transition duration-150 hover:bg-emerald-400"
                                >
                                    <FaFacebookF className="h-4 w-4  text-dark-blue-500 " />
                                </a>
                                <a
                                    href="google.com"
                                    target="_blank"
                                    className="rounded-full bg-white p-2 transition duration-150 hover:bg-emerald-400"
                                >
                                    <FaTwitter className="h-4 w-4  text-dark-blue-500 " />
                                </a>
                                <a
                                    href="google.com"
                                    target="_blank"
                                    className="rounded-full bg-white p-2 transition duration-150 hover:bg-emerald-400"
                                >
                                    <FaGoogle className="h-4 w-4  text-dark-blue-500 " />
                                </a>
                            </div>
                        </div>
                        <div className="flex flex-col justify-between gap-3 py-6 text-sm font-medium lg:flex-row lg:items-center">
                            <div className="grow">
                                <p>
                                    Copyright © 2020.All Rights Reserved By{" "}
                                    <Link className="text-emerald-400">
                                        MyTicket
                                    </Link>
                                </p>
                            </div>

                            <Link className="hover:text-emerald-400">
                                Acerca de
                            </Link>
                            <Link className="hover:text-emerald-400">
                                Condiciones de uso
                            </Link>
                            <Link className="hover:text-emerald-400">
                                Política de privacidad
                            </Link>
                            <Link className="hover:text-emerald-400">FAQ</Link>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
};

export default Footer;
