
import { Head, usePage } from "@inertiajs/react";
import React from "react";
import Footer from "./Footer/Footer";

import NotificationToast from "@/Components/Notification/NotificationToast";
import Navbar from "./Navbar/Navbar";

const Layout = ({ title = "", children }) => {
    return (
        <>
            <Head title={title} />
            <div className="min-h-screen flex flex-col justify-between ">
                <Navbar />
                <NotificationToast />
                <main className="grow ">{children}</main>
                <Footer />
            </div>
        </>
    );
};

export default Layout;
