import React from "react";
import { Swiper, SwiperSlide } from "swiper/react";
import { Navigation, Autoplay } from "swiper";
// Import Swiper styles
import "swiper/css";
const members = [
    {
        img: "/img/about/member-1.jpg",
        name: "Robert Fox",
        position: "CEO, HEAD OF COMMUNITY",
    },
    {
        img: "/img/about/member-2.jpg",
        name: "Kristin Mccoy",
        position: "CO-FOUNDER & CPO",
    },
    {
        img: "/img/about/member-3.jpg",
        name: "Shane Watson",
        position: "CHIEF OPERATING OFFICER",
    },
    {
        img: "/img/about/member-4.jpg",
        name: "Francisco Pena",
        position: "CHIEF FINANCIAL OFFICER",
    },
    {
        img: "/img/about/member-5.jpg",
        name: "Calvin Flore",
        position: "ASSET MANAGEMENT",
    },
    {
        img: "/img/about/member-6.jpg",
        name: "Kathryn Cooper",
        position: "ANIMATOR",
    },
];
const Members = () => {
    return (
        <div className="py-section container">
            <div className="mx-auto max-w-3xl text-center">
                <p className="text-2xl uppercase text-emerald-400">
                    CONOCE A NUESTROS MÁS VALIOSOS
                </p>
                <h2 className="mt-2">MIEMBROS DEL EQUIPO DE EXPERTOS</h2>
                <p className="mt-5  text-white text-opacity-90">
                    World se compromete a hacer que la participación en el
                    evento sea una experiencia libre de acoso para todos,
                    independientemente del nivel de experiencia, género,
                    identidad y expresión de género.
                </p>
            </div>
            <div className="mt-14">
                <Swiper
                    spaceBetween={30}
                    slidesPerView={4}
                    loop={true}
                    //navigation
                    autoplay={{
                        delay: 2500,
                        disableOnInteraction: false,
                    }}
                    navigation={true}
                >
                    {members.map((item, key) => (
                        <SwiperSlide key={key}>
                            <MembersCard
                                img={item.img}
                                name={item.name}
                                position={item.position}
                            />
                        </SwiperSlide>
                    ))}
                </Swiper>
            </div>
        </div>
    );
};

const MembersCard = ({ img, name, position }) => {
    return (
        <div>
            <img src={img} alt="" className="w-full rounded-md object-cover" />
            <div className="mt-7 text-center">
                <h5 className="font-normal">{name}</h5>
                <p className="mt-4 font-light uppercase text-emerald-400">
                    {position}
                </p>
            </div>
        </div>
    );
};

export default Members;
