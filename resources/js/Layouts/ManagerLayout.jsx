
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import React from 'react'
const ManagerLayout = ({ children, title }) => {
    const navigationRoute = [
        {
            name: "Eventos",
            path: "manager.events.index",
            curretRoute: "manager.events.*",
        },
        // {
        //     name: "Ordenes",
        //     path: "profile.my_orders",
        // },
        // {
        //     name: "Reportes",
        //     path: "profile.account_details",
        // },
        // {
        //     name: "Finanzas",
        //     path: "profile.change_password",
        // },
    ];
    return (
        <AuthenticatedLayout title={title} navigationRoute={navigationRoute}>
            {children}
        </AuthenticatedLayout>
    );
};

export default ManagerLayout
