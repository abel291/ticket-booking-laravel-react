import SectionHeader from "@/Components/SectionHeader";
import React from "react";
import { Swiper, SwiperSlide } from "swiper/react";
import { Navigation, Autoplay } from "swiper/modules";
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
			<SectionHeader
				subTitle="ESCUCHAR A LOS"
				title="ALTAVOCES del EVENTO"
				text="Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque nemo dolore deserunt molestias consequatur placeat qui aliquam pariatur ea provident nesciunt, praesentium beatae illum similique, odio architecto at rem dignissimos."
			/>
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
		<div className="h-[400px]">
			<img src={img} alt="" className="w-full rounded-md object-cover" />
			<div className="mt-7 text-center">
				<h5 className="font-normal">{name}</h5>
				<p className="mt-4 font-light uppercase text-primary-400">
					{position}
				</p>
			</div>
		</div>
	);
};

export default Members;
