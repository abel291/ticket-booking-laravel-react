import { Head, usePage } from "@inertiajs/inertia-react";
import React from "react";
import Navbar from "./Navbar";

const Layout = ({ title="", children }) => {
    
    return (
        <>
            <Head title={title} />
            <div className="min-h-screen bg-gray-100">
                <Navbar/>
                

                <main>{children}</main>
            </div>
        </>
    );
};

export default Layout;
