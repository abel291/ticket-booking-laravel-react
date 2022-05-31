import Search from "@/Pages/Home/Search";
import { Link } from "@inertiajs/inertia-react";
import React from "react";

const BannerSearch = ({ children, img = "", search = false }) => {
    return (
        <>
            <div className={" relative px-4 lg:px-0" + (search && " -mb-28")}>
                <div className="container flex items-center  justify-center py-32 md:py-52 lg:py-56 w-10/12 mx-auto">
                    <div className="relative z-10  text-center w-10/12 mx-auto">
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
            {search && (
                <div>
                    <Search />
                </div>
            )}
        </>
    );
};


export const BannerTitle = ({ children }) => {
    return (
        <div className="relative z-10  text-center ">
            <h1 className="font-bold">{children}</h1>
        </div>

    );
};
export const BannerContent = ({ children }) => {
    return (
        <p className="mt-5 font-medium md:text-xl xl:text-2xl">
            {children}
        </p>
    );
};
export default BannerSearch;
