import { Link } from "@inertiajs/inertia-react";
import React from "react";
import TextLoop from "react-text-loop/lib/components/TextLoop";

const BannerSearch = ({ children, img = "", search = false }) => {
    return (
        <>
            <div
                className={
                    "pt-navbar relative px-4 lg:px-0" +
                    (search && " -mb-28 pb-28")
                }
            >
                <div className="flex items-center  justify-center py-32 ">
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
            
        </>
    );
};
//
export default BannerSearch;
