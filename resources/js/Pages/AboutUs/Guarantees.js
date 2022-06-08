import React from "react";

const Guarantees = () => {
    return (
        <div className="py-section container">
            <div className="grid gap-4 lg:grid-cols-2">
                <div>
                    <div className="mx-auto max-w-3xl">
                        <p className="sub-title">
                            Echa un vistazo a nuestro recorrido
                        </p>
                        <h2 className="mt-4 font-bold ">
                            Garantías de que puedes confiar.
                        </h2>
                        <p className="text mt-4">
                            Porque más tranquilidad significa más amor por el
                            evento.
                        </p>
                    </div>
                    <div className="mt-10">
                        <div className="flex flex-col gap-8">
                            <div className="flex gap-5">
                                <img
                                    src="/img/about/icon-1.png"
                                    className="h-16 w-16"
                                    alt=""
                                />
                                <div className="">
                                    <h5 className="normal-case font-medium">
                                        Obtener garantía
                                    </h5>
                                    <p className="mt-1 leading-7 text-white text-opacity-90">
                                        Billetes auténticos, entrega a tiempo y
                                        acceso a su evento. O su dinero de
                                        vuelta. Período.
                                    </p>
                                </div>
                            </div>
                            <div className="flex gap-5">
                                <img
                                    src="/img/about/icon-2.png"
                                    className="h-16 w-16"
                                    alt=""
                                />
                                <div className="">
                                    <h5 className="normal-case font-medium">
                                        Garantía en partido de precios
                                    </h5>
                                    <p className="mt-1 leading-7 text-white text-opacity-90">
                                        Los mejores precios están aquí. Si
                                        observa un mejor trato en otro lugar,
                                        cubriremos la diferencia.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div className="hidden lg:block">
                    <img
                        src="/img/about/img-2.png"
                        alt=""
                        className="object-lefts h-full object-contain"
                    />
                </div>
            </div>
        </div>
    );
};

export default Guarantees;
