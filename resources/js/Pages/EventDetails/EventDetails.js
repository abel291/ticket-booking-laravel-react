import BannerSearch from "@/Components/BannerSearch";
import Layout from "@/Layouts/Layout";
import React from "react";
import CarouselMembers from "../../Components/CarouselMembers";
import AboutContent from "./AboutContent";
import AskedQuestions from "./AskedQuestions";
import Gallery from "./Gallery";
import SectionCountdown from "./SectionCountdown";

const EventDetails = () => {
    return (
        <Layout title="title">
            <BannerSearch img="/img/event/banner.jpg" search={true}>
                <div>
                    <h1 className="font-bold">
                        CÓMO EL JUEGO PUEDE GENERAR NUEVAS IDEAS PARA TU NEGOCIO
                    </h1>
                    <p className="mt-5 font-medium md:text-xl xl:text-2xl">
                        Lorem ipsum dolor, sit amet consectetur adipisicing
                        elit. Ipsa pariatur adipisci quaerat architecto, ab enim
                        sapiente dolores itaque vitae accusantium magnam quis
                    </p>
                </div>
            </BannerSearch>

            <SectionCountdown />

            <AboutContent />

            <Gallery />

            <CarouselMembers />

            <div className="container">
                <div className="border-t border-dark-blue-400"></div>
            </div>

            <AskedQuestions />
        </Layout>
    );
};

export default EventDetails;
