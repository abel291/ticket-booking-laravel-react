import React from "react";
import TextLorem from "./TextLorem";

const EventContent = ({img,desc_max}) => {
    return (
        <div>
            <img src={img} className="w-full rounded-md" />
            <div className="leading-7">
                <div className="my-5 text-2xl font-semibold">
                    Acerca de este evento
                </div>
                {desc_max}
                <TextLorem/>
            </div>
        </div>
    );
};

export default EventContent;
