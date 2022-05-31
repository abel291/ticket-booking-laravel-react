import BannerSearch from "@/Components/BannerSearch";
import React from "react";

const BannerFilters = ({ image }) => {
    return (
        <BannerSearch img="/img/movies.jpg" search={false}>
            <div>
                <h1 className="font-bold md:text-6xl">
                    CONSIGUE <span className="text-emerald-400">TICKETS</span>{" "}
                    DE CINE
                </h1>
                <p className="mt-5 font-medium md:text-xl xl:text-2xl ">
                    Compre Tickets de cine por adelantado, encuentre horarios de
                    películas, vea avances, lea reseñas de películas y mucho más
                </p>
            </div>
        </BannerSearch>
    );
};

export default BannerFilters;
