import NotificationToast from "@/Components/NotificationToast";
import { Head, usePage } from "@inertiajs/inertia-react";
import React from "react";
import Footer from "./Footer/Footer";
import Navbar from "./Navbar";

const Layout = ({ title = "", children }) => {
    return (
        <>
            <Head title={title} />
            <div className="min-h-screen bg-dark-blue-900 flex flex-col justify-between">
                 <Navbar />
				 <NotificationToast/>
                <main className="grow ">{children}</main>
                <Footer /> 
            </div>
        </>
    );
};

export default Layout;
