import React, { useState } from "react";
import { Swiper, SwiperSlide } from "swiper/react";
import { Navigation, Autoplay } from "swiper";
import "swiper/css";

import FsLightbox from "fslightbox-react";
const CarouselCaptures = ({ images }) => {
    const [lightboxController, setLightboxController] = useState({
        toggler: false,
        slide: 0,
    });

    function openLightboxOnSlide(number) {
        setLightboxController({
            toggler: !lightboxController.toggler,
            slide: number,
        });
    }

    return (
        <>
            <Swiper
                modules={[Autoplay]}
                spaceBetween={30}
                slidesPerView={4}
                loop={true}
                autoplay={{
                    delay: 2500,
                    disableOnInteraction: true,
                }}
                //navigation={true}
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
                {images.map((img, key) => (
                    <SwiperSlide key={key}>
                        <div
                            key={key}
                            onClick={() => openLightboxOnSlide(key + 1)}
                        >
                            <img
                                className=" h-full w-full cursor-pointer rounded-md object-cover transition hover:contrast-75"
                                src={img}
                                alt=""
                            />
                        </div>
                    </SwiperSlide>
                ))}
            </Swiper>
            <FsLightbox
                toggler={lightboxController.toggler}
                sources={images}
                slide={lightboxController.slide}
            />
        </>
    );
};

export default CarouselCaptures;
