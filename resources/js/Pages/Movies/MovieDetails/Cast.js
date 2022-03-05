import React from "react";
import { Swiper, SwiperSlide } from "swiper/react";
import { Autoplay } from "swiper";
import "swiper/css";
const Cast = ({ cast }) => {
    return (
        <>
            <Swiper
                modules={[Autoplay]}
                loop={true}
                autoplay={{
                    delay: 2500,
                    disableOnInteraction: true,
                }}
                breakpoints={{
                    // when window width is >= 480px
                    375: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    // when window width is >= 640px
                    640: {
                        slidesPerView: 3,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 4,
                        spaceBetween: 30,
                    },
                    1024: {
                        slidesPerView: 5,
                        spaceBetween: 40,
                    },
                }}
            >
                {cast.map((img, key) => (
                    <SwiperSlide key={key}>
                        <div key={key}>
                            <div
                                className="mx-auto h-36 w-36 overflow-hidden rounded-full border border-emerald-400 
                                border-opacity-50 p-2.5"
                            >
                                <img
                                    className="h-full w-full rounded-full border-4 border-emerald-400 object-cover"
                                    src={img}
                                    alt=""
                                />
                            </div>
                            <div className="mt-7 space-y-3 text-center">
                                <h6 className="font-normal">nora hardy</h6>
                                <span className=" inline-block text-sm text-emerald-400">
                                    Actor
                                </span>
                                <p className="text-sm font-light">As Magneto</p>
                            </div>
                        </div>
                    </SwiperSlide>
                ))}
            </Swiper>
        </>
    );
};

export default Cast;
