import React from "react";
import Banner from "./Banner";

import Layout from "@/Layouts/Layout";
import Section1 from "./Section1";
import Section2 from "./Section2";
import Section3 from "./Section3";
import Members from "./Members";
import Gallery from "./Gallery";
import Guarantees from "./Guarantees";
import BannerSearch from "@/Components/BannerSearch";

const AboutUs = () => {
    return (
        <Layout title="Sobre nosotros">
            <BannerSearch img="/img/about/banner.jpg" search={false}>
                <div className="text-center">
                    <h1 className="font-bold">Sobre Nosotros</h1>
                    <p className="mt-4 opacity-90 md:text-xl">
                        Inicio > Sobre nosotros
                    </p>
                </div>
            </BannerSearch>
            <div className="bg-dark-blue-800">
                <Section1 />
                <Section2 />
                <Section3 />
            </div>
            <Members />
            <div className="bg-dark-blue-800">
                <Gallery />
            </div>
            <Guarantees />
        </Layout>
    );
};

export default AboutUs;
