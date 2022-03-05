import BannerSearch from "@/Components/BannerSearch";
import Button from "@/Components/Button";
import SectionHeader from "@/Components/SectionHeader";
import Layout from "@/Layouts/Layout";
import React from "react";
import { FaTicketAlt,FaCheck } from "react-icons/fa";
const EventTicket = () => {
    return (
        <Layout title="Event Ticket">
            <BannerSearch img="/img/home/img-banner.jpg">
                <div>
                    <h1 className="font-bold">
                        CÓMO EL JUEGO PUEDE GENERAR NUEVAS IDEAS PARA TU NEGOCIO
                    </h1>
                    <p className="mt-5 font-medium md:text-xl xl:text-2xl">
                        Zhongzheng Rd. 8F., No. 788-1
                    </p>
                </div>
            </BannerSearch>
            <div className=" container">
                <div className="py-section">
                    <SectionHeader
                        subTitle="PRECIOS SENCILLOS"
                        title="HAGA UNA CITA"
                        text="El dolor en sí es el amor del dolor, la principal élite ecológica, pero le doy tiempo para tomar algunos dolores y dolores grandes. Quien suspende la venganza durante el embarazo"
                    />
                </div>
                <div className="py-section">
                    <div className="grid grid-cols-1 lg:grid-cols-3 gap-5">
                        {[1, 2, 3].map((item, key) => (
                            <div key={key}>
                                <div className="divide-y divide-gray-300 overflow-hidden rounded-xl bg-white p-8 text-gray-700">
                                    <div className="pb-7 text-center">
                                        <FaTicketAlt className="inline-block h-full w-14  " />
                                        <span className="mt-3 block">
                                            Entrada estándar
                                        </span>
                                        <h3 className="mt-5 font-bold text-blue-700">
                                            $12.00{" "}
                                        </h3>
                                    </div>
                                    <div className="py-7">
                                        <div className="flex items-center gap-4">
                                            <FaCheck className="h-full w-5 text-green-500" />
                                            <span>
                                                Full access to all lectures and
                                                workshops
                                            </span>
                                        </div>
                                    </div>

                                    <div className="py-7">
                                        <div className="flex items-center gap-4">
                                            <FaCheck className="h-full w-5 text-green-500" />
                                            <span>Video presentations</span>
                                        </div>
                                    </div>
                                    <div className="py-7">
                                        <div className="flex items-center gap-4">
                                            <FaCheck className="h-full w-5 text-green-500" />
                                            <span>
                                                Meet all of our event speakers
                                            </span>
                                        </div>
                                    </div>
                                    <div className="pt-10 text-center">
                                        <Button>Reservar Ticket</Button>
                                    </div>
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </div>
        </Layout>
    );
};

export default EventTicket;
