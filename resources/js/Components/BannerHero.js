import Search from "@/Pages/Home/Search";
import { Link } from "@inertiajs/inertia-react";
import React from "react";
import BannerSearch from "./BannerSearch";

const BannerHero
    = ({ title, desc, img = "", search = false }) => {
        return (
            <BannerSearch img={img} search={search}>
                <>
                    <div className="relative z-10  text-center ">
                        <h1 className="font-bold">{title}</h1>
                    </div>
                    <p className="mt-5 font-medium md:text-xl xl:text-2xl">
                        {desc}
                    </p>
                </>
            </BannerSearch>
        );
    };
//
export default BannerHero
    ;
