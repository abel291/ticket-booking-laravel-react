
import Layout from "@/Layouts/Layout";
import React from "react";
import AskedQuestions from "./AskedQuestions";
import EventSidebar from "./EventSidebar";
import EventContent from "./EventContent";
import EventGallery from "./EventGallery";
import CarouselSpeakers from "./CarouselSpeakers";

import BannerHero from "@/Components/BannerHero";

const EventDetails = ({ event }) => {
    console.log(event);
    return (
        <Layout title={event.title}>
            <BannerHero img={event.banner} title={event.title} desc={event.desc_min} />

            {/* <SectionCountdown 
            descMin={event.desc_min} 
            address={event.location} /> */}
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
                                    slug={event.slug}
                                />
                            </div>
                        </div>
                    </div>
                </div>

                <div className="py-section">
                    {event.images.length  && <EventGallery images={event.images} />}
                </div>

                {event.speakers.length && <CarouselSpeakers speakers={event.speakers} />}

                <AskedQuestions />
            </div>



        </Layout>
    );
};

export default EventDetails;
