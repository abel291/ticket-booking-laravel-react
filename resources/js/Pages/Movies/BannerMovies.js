import BannerSearch from "@/Components/BannerSearch";
import React from "react";

const BannerMovies = () => {
    return (
        <BannerSearch img="/img/home/img-banner.jpg" search={true}>
            <div>
                <h1 className="font-bold">
                    CONSIGUE <span className="text-emerald-400">TICKETS</span>{" "}
                    DE CINE
                </h1>
                <p className="mt-5 font-medium md:text-xl xl:text-2xl">
                    Compre Tickets de cine por adelantado, encuentre horarios de
                    películas, vea avances, lea reseñas de películas y mucho más
                </p>
            </div>
        </BannerSearch>
    );
};

export default BannerMovies;
