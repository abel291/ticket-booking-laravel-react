
import Layout from "@/Layouts/Layout";
import React from "react";
import AskedQuestions from "./AskedQuestions";
import EventSidebar from "./EventSidebar";
import EventContent from "./EventContent";
import EventGallery from "./EventGallery";
import CarouselSpeakers from "./CarouselSpeakers";

import BannerHero from "@/Components/BannerHero";
import SectionCountdown from "./SectionCountdown";
import { Link } from "@inertiajs/inertia-react";

const EventDetails = ({ event }) => {
	
	return (
		<Layout title={event.title}>
			<BannerHero img={event.banner} title={event.title} desc={event.desc_min} />

			{/* <SectionCountdown 
            title={event.title}
            location={event.location} /> */}
			<div className="container">
				<div className="py-section">
					<div className="flex flex-col-reverse justify-between gap-y-8 gap-x-8 lg:flex-row lg:gap-y-0">
						<div className="w-full lg:w-9/12 ">
							<EventContent
								img={event.card}
								desc_max={event.desc_max}
							/>
						</div>
						<div className="w-full lg:w-3/12 ">
							<div className="space-y-10">
								<EventSidebar
									sessions={event.sessions}
									location={event.location}
									ticket_types={event.ticket_types}
								/>
								<div>
									{event.session ? (
										<Link
											className="btn bg-gradient-red-invert"
											href={route("checkout", {
												slug: event.slug,
											})}
										>
											RESERVAR ENTRADAS
										</Link>
									) : (
										<div className="text-center">
											<button disabled className="btn bg-gradient-red-invert disabled:opacity-25 ">RESERVAR ENTRADAS</button>
											<span className="block text-red-500 text-xs mt-2">Sin fechas disponibles</span>
										</div>
									)}
								</div>
							</div>
						</div>
					</div>
				</div>

				<div className="py-section">
					{event.images.length && <EventGallery images={event.images} />}
				</div>

				{event.speakers.length && <CarouselSpeakers speakers={event.speakers} />}

				<AskedQuestions />
			</div>



		</Layout>
	);
};

export default EventDetails;
