import Search from "@/Pages/Home/Search";
import { Link } from "@inertiajs/inertia-react";
import React from "react";


const BannerSearch = ({ children, img = "",  search = false }) => {
    return (
        <>
            <div className={" relative px-4 lg:px-0" + (search && " -mb-28")}>
                <div className="flex items-center  justify-center py-32 md:py-52 lg:py-72 ">
                    <div className="relative z-10 max-w-5xl text-center  ">
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
//
export default BannerSearch;
