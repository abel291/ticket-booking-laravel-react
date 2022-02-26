import React from "react";
import Banner from "./Banner";

import Layout from "@/Layouts/Layout";
import Section1 from "./Section1";
import Section2 from "./Section2";
import Section3 from "./Section3";
import Members from "./Members";
import Gallery from "./Gallery";

const AboutUs = () => {
    return (
        <Layout title="Sobre nosotros">
            {/* <Banner />
             <Section1 /> */}
            <Section2 />
            <Section3 /> 
            {/*<Members />
            <Gallery /> */}
        </Layout>
    );
};

export default AboutUs;
