import React from "react";
import ApplicationLogo from "@/Components/ApplicationLogo";
import { Link } from "@inertiajs/inertia-react";

export default function Guest({ children }) {
    return (
        <div className="flex min-h-screen flex-col items-center bg-dark-blue-900 pt-6 sm:justify-center sm:pt-0">
			
            <div>
                <Link href="/">
                    <ApplicationLogo className="text-4xl text-white" />
                </Link>
            </div>
            <div className=" mt-6 w-full overflow-hidden bg-dark-blue-800 px-10 py-14 text-white shadow-lg brightness-100 sm:max-w-lg sm:rounded">
                {children}
            </div>
        </div>
    );
}
