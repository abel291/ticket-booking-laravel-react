import React from 'react'
import DesktopNavbar from './DesktopNavbar';
import MovileNavbar from './MovileNavbar/MovileNavbar';

const Navbar = () => {
    let navigation = [
        {
            title: "Inicio",
            path: route("home"),
            current: route().current("home"),
        },

        {
            title: "Conciertos",
            path: route("events", { categories: ["conciertos"] }),
            current: route().current("events"),
            hidenMovil: true
        },

        {
            title: "Turismo",
            path: route("events", { categories: ["turismo"] }),
            current: route().current("events"),
            hidenMovil: true
        },

        {
            title: "Festivales",
            path: route("events", { categories: ["festivales"] }),
            current: route().current("events"),
            hidenMovil: true
        },

        {
            title: "Acerca de",
            path: route("about_us"),
            current: route().current("about_us"),
        },
        {
            title: "Contáctenos",
            path: route("contact_us"),
            current: route().current("contact_us"),
        },

    ];
    return (
        <>
            <MovileNavbar navigation={navigation} />
            <DesktopNavbar navigation={navigation} />
        </>
    )
}

export default Navbar
