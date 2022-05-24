import BannerSearch from "@/Components/BannerSearch";
import React from "react";

const BannerEvent = ({img,title,desc}) => {
    return (
        <BannerSearch img={img} search={false}>
            <div>
                <h1 className="font-bold">{title}</h1>
                <p className="mt-5 font-medium md:text-xl xl:text-2xl">
                    {desc}
                </p>
            </div>
        </BannerSearch>
    );
};

export default BannerEvent;
