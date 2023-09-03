import React from "react";
import { Swiper, SwiperSlide } from "swiper/react";
import { Navigation, Autoplay } from "swiper/modules";
import "swiper/css";
import "swiper/css/navigation";
import SectionHeader from "@/Components/SectionHeader";
import Carousel from "@/Components/Carousel";
import CardSpeaker from "@/Components/Card/CardSpeaker";
const members = [
    {
        name: "lorem",
        img: "/img/about/member-1.jpg",
        position: "manager",
    },
    {
        name: "lorem",
        img: "/img/about/member-2.jpg",
        position: "manager",
    },
    {
        name: "lorem",
        img: "/img/about/member-3.jpg",
        position: "manager",
    },
    {
        name: "lorem",
        img: "/img/about/member-4.jpg",
        position: "manager",
    },
    {
        name: "lorem",
        img: "/img/about/member-5.jpg",
        position: "manager",
    },
    {
        name: "lorem",
        img: "/img/about/member-6.jpg",
        position: "manager",
    },
];
const Members = () => {
    return (
        <div className="py-section container">
            <SectionHeader
                subTitle="CONOCE A NUESTROS MÁS VALIOSOS"
                title="MIEMBROS DEL EQUIPO DE EXPERTOS"
                text=" World se compromete a hacer que la participación en el
                evento sea una experiencia libre de acoso para todos,
                independientemente del nivel de experiencia, género,
                identidad y expresión de género."
            />

            <div className="mt-14">

                <Carousel
                    breakpoints={{
                        420: {
                            slidesPerView: 1,
                            spaceBetween: 20,
                        },
                        768: {
                            slidesPerView: 3,
                            spaceBetween: 30,
                        },
                        1024: {
                            slidesPerView: 4,
                            spaceBetween: 30,
                        },
                    }}
                >

                    {members.map((item, key) => (
                        <SwiperSlide key={key}>
                            <CardSpeaker
                                img={item.img}
                                name={item.name}
                                position={item.position}
                            />
                        </SwiperSlide>
                    ))}
                </Carousel>
            </div>
        </div>
    );
};


export default Members;
