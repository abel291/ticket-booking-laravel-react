
import React from "react";
import { SwiperSlide } from "swiper/react";
const images = [
    {
        img: "/img/event/gallery-1.jpg",
        name: "Robert Fox",
        position: "CEO, HEAD OF COMMUNITY",
    },
    {
        img: "/img/event/gallery-2.jpg",
        name: "Kristin Mccoy",
        position: "CO-FOUNDER & CPO",
    },
    {
        img: "/img/event/gallery-3.jpg",
        name: "Shane Watson",
        position: "CHIEF OPERATING OFFICER",
    },
    {
        img: "/img/event/gallery-4.jpg",
        name: "Francisco Pena",
        position: "CHIEF FINANCIAL OFFICER",
    },
    {
        img: "/img/event/gallery-5.jpg",
        name: "Calvin Flore",
        position: "ASSET MANAGEMENT",
    },
    {
        img: "/img/event/gallery-6.jpg",
        name: "Kathryn Cooper",
        position: "ANIMATOR",
    },
    {
        img: "/img/event/gallery-3.jpg",
        name: "Shane Watson",
        position: "CHIEF OPERATING OFFICER",
    },
    {
        img: "/img/event/gallery-4.jpg",
        name: "Francisco Pena",
        position: "CHIEF FINANCIAL OFFICER",
    },

];

const EventGallery = () => {
    return (
        <div className="relative ">
            <div className="grid grid-cols-4 gap-6">
                {images.map((item, key) => (
                    <img key={key}
                        src={item.img}
                        alt=""
                        className=" h-[200px] w-full  rounded-lg object-cover"
                    />
                ))}
            </div>
        </div>
    );
};

export default EventGallery;
