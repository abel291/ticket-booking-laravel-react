
import React from "react";
import {  SwiperSlide } from "swiper/react";
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
];
import Carousel from "@/Components/Carousel";
const EventGallery = () => {
    return (
        <div className="relative ">
            <Carousel>
                {images.map((item, key) => (
                    <SwiperSlide key={key}>
                        <img
                            src={item.img}
                            alt=""
                            className=" h-[600px] w-full  rounded-lg object-cover"
                        />
                    </SwiperSlide>
                ))}
            </Carousel>
        </div>
    );
};

export default EventGallery;
