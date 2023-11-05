import React from "react";
import SectionUnderBanner from "@/Components/SectionUnderBanner";

import Select from "@/Components/Select";
const BannerCheckout = ({ title, lang }) => {
	return (
		<div className="pt-navbar relative">
			<div className=" z-10 grid py-28">
				<div
					style={{ backgroundImage: "url(/img/movie/banner.png)" }}
					className={
						"absolute inset-0 bg-cover bg-center bg-no-repeat brightness-75 before:absolute before:inset-0 before:bg-gradient-to-t before:from-primary-900  before:content-[''] "
					}
				></div>
				<div className="relative place-self-center text-center">
					<div>
						<h3 className="uppercase font-bold">
							{title}
						</h3>
						<span className="mt-2 text-blue-300">
							{lang}
						</span>
					</div>
				</div>
			</div>
		</div>
	);
};

export default BannerCheckout;
