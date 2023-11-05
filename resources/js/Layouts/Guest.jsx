import React from "react";
import ApplicationLogo from "@/Components/ApplicationLogo";
import { Link } from "@inertiajs/react";

export default function Guest({ children }) {
    return (
        <div className="flex min-h-screen flex-col items-center justify-center  pt-6 sm:justify-center sm:pt-0">

            <div>
                <Link href="/">
                    <ApplicationLogo className="text-4xl text-primary-500" />
                </Link>
            </div>
            <div className="bg-white mt-6 w-full overflow-hidden  px-10 py-14  shadow brightness-100 sm:max-w-lg sm:rounded">
                {children}
            </div>
        </div>
    );
}
