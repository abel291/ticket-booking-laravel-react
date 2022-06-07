import Search from "@/Pages/Home/Search";

import React from "react";

const BannerSearch = ({ children, img = "", search = false }) => {
    return (
        <>
            {/*pt-20 md:pt-24 pdding navbar*/}
            <div className="relative px-4 lg:px-0 md:pt-20">
                <div className=" container flex items-center justify-center py-20 md:py-28 lg:py-40 mx-auto">
                    <div className="relative z-10  text-center w-10/12 mx-auto">
                        {children}
                    </div>
                </div>

                <div
                    style={{ backgroundImage: "url(" + img + ")" }}
                    className=" absolute inset-0 bg-cover bg-center bg-no-repeat opacity-10">

                </div>
                <div className="bg-gradient-invert absolute inset-0 opacity-20"></div>

            </div>
            {
                search && (
                    <div className="-mt-20">
                        <Search />
                    </div>
                )
            }
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
