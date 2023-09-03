
import React from "react";
import Hero from "./Hero";

const BannerHero = ({ title, desc, img = null }) => {
    return (
        <Hero img={img}>
            <div className=" text-center ">
                <h1 className="font-bold">{title}</h1>
                {desc && (
                    <p className=" mt-5 font-medium md:text-xl xl:text-2xl">
                        {desc}
                    </p>
                )}
            </div>

        </Hero >
    );
};
//
export default BannerHero
    ;
