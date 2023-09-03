import { Link } from "@inertiajs/react";
import React from "react";
import tEXT from "react";
import TextLorem from "./TextLorem";

const AboutContent = ({ descMax, img, sessions, location, ticket_types }) => {
	return (
		<div className="py-section container relative">
			<div className="flex flex-col-reverse justify-between gap-y-8 gap-x-8 lg:flex-row lg:gap-y-0">
				<div className="w-full lg:w-9/12 ">
					<img src={img} className="w-full rounded-md" />
					<div className="leading-7">
						<div className="my-5 text-2xl font-semibold">
							Acerca de este evento
						</div>
						{descMax}
					</div>
				</div>
				<div className="w-full lg:w-3/12 ">

				</div>
			</div>
		</div>
	);
};



export default AboutContent;
