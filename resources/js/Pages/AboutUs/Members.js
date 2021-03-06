import React from "react";
import { Swiper, SwiperSlide } from "swiper/react";
import { Navigation, Autoplay } from "swiper";
import "swiper/css";
import "swiper/css/navigation";
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
            <div className="mx-auto max-w-3xl text-center">
                <p className="sub-title">CONOCE A NUESTROS MÁS VALIOSOS</p>
                <h2 className="mt-4 font-bold">
                    MIEMBROS DEL EQUIPO DE EXPERTOS
                </h2>
                <p className="text  mt-4">
                    World se compromete a hacer que la participación en el
                    evento sea una experiencia libre de acoso para todos,
                    independientemente del nivel de experiencia, género,
                    identidad y expresión de género.
                </p>
            </div>
            <div className="mt-14">
                <Swiper
                    modules={[Navigation, Autoplay]}
                    spaceBetween={30}
                    slidesPerView={4}
                    loop={true}
                    //navigation
                    autoplay={{
                        delay: 2500,
                        disableOnInteraction: true,
                    }}
                    navigation={true}
                    breakpoints={{
                        // when window width is >= 480px
                        375: {
                            slidesPerView: 1,
                            spaceBetween: 10,
                        },
                        // when window width is >= 640px
                        640: {
                            slidesPerView: 2,
                            spaceBetween: 20,
                        },
                        768: {
                            slidesPerView: 3,
                            spaceBetween: 30,
                        },
                        1024: {
                            slidesPerView: 4,
                            spaceBetween: 40,
                        },
                    }}
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
