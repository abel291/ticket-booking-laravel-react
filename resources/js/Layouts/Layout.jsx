
import { Head, usePage } from "@inertiajs/react";
import React from "react";
import Footer from "./Footer/Footer";
import Navbar from "./Navbar";
import NotificationToast from "@/Components/Notification/NotificationToast";

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
