import Layout from "@/Layouts/Layout";
import React from "react";
import AskedQuestions from "./AskedQuestions";
import EventSidebar from "./EventSidebar";
import EventContent from "./EventContent";
import EventGallery from "./EventGallery";
import CarouselSpeakers from "./CarouselSpeakers";

import { Link } from "@inertiajs/react";
import HeroEvent from "@/Components/Hero/HeroEvent";

const EventDetails = ({ event }) => {
    return (
        <Layout title={event.title}>
            <HeroEvent
                event={event}
                img={event.banner}
                title={event.title}
                desc={event.desc_min}
            />

            {/* <SectionCountdown
            title={event.title}
            location={event.location} /> */}
            <div className="container ">
                <div className="flex flex-col justify-between gap-x-10 lg:flex-row">
                    <div className="w-full lg:w-9/12 ">
                        <div className="py-section">
                            <EventContent
                                img={event.card}
                                desc_max={event.desc_max}
                            />
                        </div>
                    </div>
                    <div className="w-full lg:w-3/12 ">
                        <div className="py-section">
                            <EventSidebar
                                sessions={event.sessions}
                                location={event.location}
                                ticket_types={event.ticketTypes}
                            />
                            <div className="mt-6">
                                {event.session ? (
                                    <Link
                                        className="btn btn-primary "
                                        href={route("checkout", {
                                            slug: event.slug,
                                        })}
                                    >
                                        Reservar entradas
                                    </Link>
                                ) : (
                                    <div className="text-center">
                                        <button
                                            disabled
                                            className="btn btn-primary disabled:opacity-25 "
                                        >
                                            Reservar entradas
                                        </button>
                                        <span className="mt-2 block text-xs text-red-500">
                                            Sin fechas disponibles
                                        </span>
                                    </div>
                                )}
                            </div>
                        </div>
                    </div>
                </div>

                {event.images.length && (
                    <div className="py-section">
                        <EventGallery images={event.images} />
                    </div>
                )}
                {event.speakers.length && (
                    <div className="py-section">
                        <CarouselSpeakers speakers={event.speakers} />
                    </div>
                )}

                <AskedQuestions />
            </div>
        </Layout>
    );
};

export default EventDetails;
