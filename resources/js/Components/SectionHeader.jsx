import React from "react";

const SectionHeader = ({ subTitle = "", title = "", text = "" }) => {
    return (
        <div className="mx-auto text-center max-w-5xl">
            <p className="text-lg uppercase text-red-500 sm:text-xl md:text-2xl font-medium">
                {subTitle}
            </p>
            <h2 className="mt-4 font-bold max-w-3xl mx-auto uppercase">
                {title}
            </h2>
            <p className="leading-7 mt-4">{text}</p>
        </div>
    );
};

export default SectionHeader;
