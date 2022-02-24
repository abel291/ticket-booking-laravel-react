import React from "react";
import ApplicationLogo from "@/Components/ApplicationLogo";
import { Link } from "@inertiajs/inertia-react";

export default function Guest({ children }) {
    return (
        <div className="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-dark-blue-900">
            <div>
                <Link href="/">
                    <ApplicationLogo className="text-white text-4xl" />
                </Link>
            </div>
            <div className=" text-white w-full sm:max-w-md mt-6 px-6 py-4 bg-dark-blue-500 brightness-100 shadow-lg overflow-hidden sm:rounded">
                {children}
            </div>
        </div>
    );
}
