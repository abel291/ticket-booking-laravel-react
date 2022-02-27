import Search from "@/Pages/Home/Search";
import { Link } from "@inertiajs/inertia-react";
import React from "react";
import TextLoop from "react-text-loop/lib/components/TextLoop";

const BannerSearch = ({ children, img = "", search = true }) => {
    return (
        <>
            <div
                className={
                    "relative px-4 lg:px-0 " + (search && "lg:pb-[150px]")
                }
            >
                <div className="pt-navbar flex min-h-screen items-center justify-center">
                    <div className="relative z-10 max-w-4xl text-center  ">
                    {children}
                    </div>
                </div>

                <div
                    style={{ backgroundImage: "url(" + img + ")" }}
                    className={
                        " before:bg-gradient absolute inset-0 bg-cover bg-center bg-no-repeat opacity-40 before:absolute before:inset-0 before:opacity-50 before:content-[''] "
                    }
                ></div>
            </div>
            {search && <Search />}
        </>
    );
};
//
export default BannerSearch;
