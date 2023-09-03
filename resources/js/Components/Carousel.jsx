
import React from "react";
import { Swiper, SwiperSlide } from "swiper/react";
import { Navigation, Autoplay } from "swiper/modules";
import "swiper/css";
import "swiper/css/navigation";
import { ChevronLeftIcon, ChevronRightIcon } from "@heroicons/react/24/solid";
const Carousel = ({ children, breakpoints }) => {
	return (

		<div className="relative ">
			{/*<div className="relative carousel-img"> */}
			<div className="absolute top-2/4 z-10 flex w-full items-center ">
				<button
					aria-label="prev-button"
					className=" button-prev-marcas 3xl:w-12 3xl:h-12 3xl:text-2xl text-gray-0 duration-250  start-0 absolute -mt-2 flex h-10 w-10 -translate-x-1/4 transform items-center justify-center rounded-full bg-primary-500 text-sm text-white transition hover:bg-primary-700 hover:text-white focus:outline-none md:-mt-2 md:text-base lg:h-9 lg:w-9 lg:-translate-x-1/2 lg:text-xl  xl:h-10 xl:w-10 "
				>
					<ChevronLeftIcon className="h-6 w-6 lg:h-4 lg:w-4" />
				</button>
				<button
					aria-label="next-button"
					className=" button-next-marcas 3xl:w-12 3xl:h-12 3xl:text-2xl duration-250 end-0 absolute right-0 -mt-2 flex h-10 w-10 translate-x-1/4 transform items-center justify-center rounded-full bg-primary-500 text-sm text-white transition hover:bg-primary-700 hover:text-white focus:outline-none md:-mt-2 md:text-base lg:h-9 lg:w-9 lg:translate-x-1/2 lg:text-xl xl:h-10 xl:w-10 "
				>
					<ChevronRightIcon className="h-6 w-6 lg:h-4 lg:w-4" />
				</button>
			</div>
			<Swiper
				modules={[Navigation, Autoplay]}
				loop={true}
				slidesPerView={1}
				centeredSlides={true}
				breakpoints={breakpoints}
				navigation={{
					nextEl: ".button-next-marcas",
					prevEl: ".button-prev-marcas",
				}}
				autoplay={{
					delay: 2500,
					disableOnInteraction: true,
				}}
			>

				{children}

			</Swiper>
		</div >
	);
};

export default Carousel;
