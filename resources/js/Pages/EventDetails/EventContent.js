import React from "react";
import TextLorem from "./TextLorem";

const EventContent = ({ img, desc_max }) => {
    return (
        <div>
            <img src={img} className="w-full rounded-md" />
            <div className="leading-7 mt-8 md:mt-16 space-y-4">
                <div className="text-2xl font-semibold">
                    Acerca de este evento
                </div>
                <div>
                    {desc_max}
                </div>
                <TextLorem />
            </div>
        </div>
    );
};

export default EventContent;
