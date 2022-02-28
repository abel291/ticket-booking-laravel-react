import Layout from "@/Layouts/Layout";
import React from "react";
import Banner from "./Banner";
import CarouselCapture from "./CarouselCaptures";
import Cast from "./Cast";
import Sinopsis from "./Sinopsis";

const Movie = () => {
    const ImgCapture = [
        "/img/movie/capture-1.png",
        "/img/movie/capture-2.png",
        "/img/movie/capture-3.png",
        "/img/movie/capture-4.png",
        "/img/movie/capture-5.png",
        "/img/movie/capture-6.png",
    ];
    const ImgCast = [
        "/img/movie/cast-1.jpg",
        "/img/movie/cast-2.jpg",
        "/img/movie/cast-3.jpg",
        "/img/movie/cast-4.jpg",
        "/img/movie/cast-5.jpg",
        "/img/movie/cast-6.jpg",
    ];
    return (
        <Layout title="title">
            <Banner />
            <div className="py-section container space-y-10 lg:space-y-14">
                <SectionContent title="Capturas">
                    <CarouselCapture images={ImgCapture} />
                </SectionContent>

                <SectionContent title="Sinopsis">
                    <Sinopsis text="" />
                </SectionContent>

                <SectionContent title="Elenco">
                    <Cast cast={ImgCast} />
                </SectionContent>
            </div>
        </Layout>
    );
};

const SectionContent = ({ title, children }) => {
    return (
        <div>
            <h5 className="font-normal uppercase">{title}</h5>
            <div className="mt-6">{children}</div>
        </div>
    );
};

export default Movie;
