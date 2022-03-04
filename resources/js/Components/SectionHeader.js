import React from "react";

const SectionHeader = ({ header }) => {
    return (
        <div className="mx-auto max-w-3xl text-center">
            <p className="sub-title uppercase">{header.subTitle}</p>
            <h2 className="mt-4 font-bold uppercase">{header.title}</h2>
            <p className="text mt-4">{header.text}</p>
        </div>
    );
};

export default SectionHeader;
