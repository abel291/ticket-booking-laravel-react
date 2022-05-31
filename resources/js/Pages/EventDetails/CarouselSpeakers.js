import Carousel from "@/Components/Carousel";
import SectionHeader from "@/Components/SectionHeader";
import React from "react";
import { SwiperSlide } from "swiper/react";


const CarouselSpeakers = ({ speakers }) => {
    return (
        <div className="py-section">
            <SectionHeader
                subTitle="ESCUCHAR A LOS"
                title="ALTAVOCES del EVENTO"
                text="Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque nemo dolore deserunt molestias consequatur placeat qui aliquam pariatur ea provident nesciunt, praesentium beatae illum similique, odio architecto at rem dignissimos."
            />
            <div className="gallery-img-event relative mt-14">
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
                    }}>
                    {speakers.map((item, key) => (
                        <SwiperSlide key={key}>
                            <div>
                                <img
                                    src={item.img}
                                    alt=""
                                    className="h-[300px] w-full rounded-lg object-cover"
                                />
                                <div className="mt-7 text-center">
                                    <h5 className="font-normal">{item.name}</h5>
                                    <p className="mt-4 font-light uppercase text-emerald-400">
                                        {item.position}
                                    </p>
                                </div>
                            </div>
                        </SwiperSlide>
                    ))}
                </Carousel>
            </div>
        </div>
    );
};

export default CarouselSpeakers;
