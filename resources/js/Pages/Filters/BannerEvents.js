import BannerSearch from "@/Components/BannerSearch";
import React from "react";

const BannerEvents = () => {
    return (
        <BannerSearch img="/img/home/img-banner.jpg" search={true}>
            <div>
                <h1 className="font-bold">
                    OBTENER ENTRADAS PARA{" "}
                    <span className="text-emerald-400">EVENTOS</span>
                </h1>
                <p className="mt-5 font-medium md:text-xl xl:text-2xl">
                    Compre boletos para eventos con anticipación, encuentre
                    horarios de eventos y mucho más
                </p>
            </div>
        </BannerSearch>
    );
};

export default BannerEvents;
