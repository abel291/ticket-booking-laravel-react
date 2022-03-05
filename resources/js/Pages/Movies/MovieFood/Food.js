import BannerCheckout from "@/Components/BannerCheckout";

import Layout from "@/Layouts/Layout";
import { Link } from "@inertiajs/inertia-react";
import React from "react";
import ListFood from "./ListFood";
import OrderSummary from "./OrderSummary";

const MovieFood = () => {
    return (
        <Layout title="Comida">
            <BannerCheckout
                title="La Familia Mitchell Vs. Las Máquinas"
                lang="ENGLISH, HINDI TELEGU TAMIL"
            />
            <div className="py-section container">
                <div className="flex flex-col gap-6 lg:flex-row">
                    <div className="w-full lg:w-8/12">
                        <div className="text-center">
                            <span className="text-2xl uppercase text-emerald-400">
                                ESTÁS HAMBRIENTO
                            </span>
                            <h2 className="mt-4 uppercase">TENEMOS COMIDA</h2>
                            <p className="mt-4">
                                ¡Reserve su comida con anticipación y ahorre
                                más!
                            </p>
                        </div>
                        <div className="mt-14">
                            <ListFood />
                        </div>
                    </div>
                    <div className="w-full lg:w-4/12">
                        <OrderSummary />
                        <div className="bg-dark-blue-700 py-6">
                            <div className="text-center">
                                <Link href={route("checkout")} className="btn">
                                    Proceder a pagar
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </Layout>
    );
};

export default MovieFood;
