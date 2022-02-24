import ApplicationLogo from "@/Components/ApplicationLogo";
import { ArrowCircleDownIcon } from "@heroicons/react/solid";
import { Link } from "@inertiajs/inertia-react";
import React from "react";
import Newsletter from "./Newsletter";

const Footer = () => {
    return (
        <>
            <div className="relative">
                <div className="container ">
                    <Newsletter />
                </div>
                <div className="h-[300px] mt-[-300px]">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 1440 320"
                    >
                        <path
                            fill="#032055"
                            fill-opacity="1"
                            d="M0,64L80,80C160,96,320,128,480,122.7C640,117,800,75,960,53.3C1120,32,1280,32,1360,32L1440,32L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"
                        ></path>
                    </svg>
                </div>
            </div>
            <div className="bg-dark-blue-500 pt-24">
                <div className="container">
                    <div>
                        <div className="flex items-center justify-between border-b border-dark-blue-500 pb-4">
                            <div className="">
                                <ApplicationLogo className="text-3xl text-white" />
                            </div>
                            <div className="flex items-center gap-2">
                                <a href="google.com" target="_blank">
                                    <ArrowCircleDownIcon className="h-8 w-8 text-white transition duration-150 hover:text-emerald-400" />
                                </a>
                                <a href="google.com" target="_blank">
                                    <ArrowCircleDownIcon className="h-8 w-8 text-white transition duration-150 hover:text-emerald-400" />
                                </a>
                                <a href="google.com" target="_blank">
                                    <ArrowCircleDownIcon className="h-8 w-8 text-white transition duration-150 hover:text-emerald-400" />
                                </a>
                                <a href="google.com" target="_blank">
                                    <ArrowCircleDownIcon className="h-8 w-8 text-white transition duration-150 hover:text-emerald-400" />
                                </a>
                                <a href="google.com" target="_blank">
                                    <ArrowCircleDownIcon className="h-8 w-8 text-white transition duration-150 hover:text-emerald-400" />
                                </a>
                            </div>
                        </div>
                        <div className="flex items-center justify-between py-6 text-sm">
                            <div>
                                <p className="">
                                    Copyright © 2020.All Rights Reserved By{" "}
                                    <Link className="text-emerald-400">
                                        MyTicket
                                    </Link>
                                </p>
                            </div>
                            <div className="flex items-center gap-3 ">
                                <Link className="hover:text-emerald-400">
                                    About
                                </Link>
                                <Link className="hover:text-emerald-400">
                                    Terms Of Use
                                </Link>
                                <Link className="hover:text-emerald-400">
                                    Privacy Policy
                                </Link>
                                <Link className="hover:text-emerald-400">
                                    FAQ
                                </Link>
                                <Link className="hover:text-emerald-400">
                                    Feedback
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
};

export default Footer;
