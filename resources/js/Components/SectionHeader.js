import React from "react";

const SectionHeader = ({ subTitle="", title="", text="" }) => {
    return (
        <div className="mx-auto max-w-3xl text-center">
            <p className="sub-title uppercase">{subTitle}</p>
            <h2 className="mt-4 font-bold uppercase">{title}</h2>
            <p className="text mt-4">{text}</p>

        </div>
    );
};

export default SectionHeader;
