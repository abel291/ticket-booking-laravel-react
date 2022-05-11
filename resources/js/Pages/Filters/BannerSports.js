import BannerSearch from "@/Components/BannerSearch";
import React from "react";

const BannerSports = () => {
    return (
        <BannerSearch img="/img/sports.jpg" search={true}>
            <div>
                <h1 className="font-bold">
                    CONSEGUIR ENTRADAS{" "}
                    <span className="text-emerald-400">DEPORTIVAS</span>
                </h1>
                <p className="mt-5 font-medium md:text-xl xl:text-2xl">
                    Compre boletos para partidos con anticipación, busque
                    horarios de eventos y mucho más
                </p>
            </div>
        </BannerSearch>
    );
};

export default BannerSports;
