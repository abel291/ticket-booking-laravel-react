import React from "react";
import Banner from "./Banner";

import Layout from "@/Layouts/Layout";
import Section1 from "./Section1";
import Section2 from "./Section2";
import Section3 from "./Section3";
import Members from "./Members";
import Gallery from "./Gallery";
import Guarantees from "./Guarantees";

const AboutUs = () => {
    return (
        <Layout title="Sobre nosotros">
            <Banner />
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
