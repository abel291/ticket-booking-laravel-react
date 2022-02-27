import BannerSearch from "@/Components/BannerSearch";
import { Link } from "@inertiajs/inertia-react";
import React from "react";
import TextLoop from "react-text-loop/lib/components/TextLoop";

const Banner = () => {
    return (
        <BannerSearch img="/img/home/img-banner.jpg">
            <>
                <h1>Obtener boletos de película</h1>
                <p className="mt-5 font-medium md:text-xl xl:text-2xl">
                    Compre entradas para películas con antelación, encuentre los
                    remolques de relojes de películas, lea las reseñas de
                    películas y mucho más
                </p>
            </>
        </BannerSearch>
    );
};

export default Banner;
