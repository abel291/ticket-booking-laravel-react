import React from "react";
import Banner from "./Banner";

import Layout from "@/Layouts/Layout";
import Section1 from "./Section1";
import Section2 from "./Section2";
import Section3 from "./Section3";
import Members from "./Members";
import Gallery from "./Gallery";
import Guarantees from "./Guarantees";
import BannerHero from "@/Components/Hero/BannerHero";

const AboutUs = () => {
    return (
        <Layout title="Sobre nosotros">
            <BannerHero img="/img/about/banner.jpg" title="Sobre Nosotros" />
            <div className="bg-gray-100">
                <Section1 />
                <Section2 />
                <Section3 />
            </div>
            <Members />
            <div className="bg-gray-100">
                <Gallery />
            </div>
            <Guarantees />
        </Layout>
    );
};

export default AboutUs;
