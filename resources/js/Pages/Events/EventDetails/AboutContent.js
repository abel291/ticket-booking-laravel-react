import React from "react";

const AboutContent = () => {
    return (
        <div className="py-section container relative">
            <div className="flex flex-col-reverse justify-between gap-y-8 lg:flex-row lg:gap-y-0">
                <div className="w-full lg:w-5/12 ">
                    <span className="text-2xl uppercase text-emerald-400">
                        ¿ESTÁS LISTO PARA ASISTIR?
                    </span>
                    <h2 className="mt-4 font-semibold uppercase">
                        Cómo el juego puede generar nuevas ideas para tu negocio
                    </h2>
                    <p className="mt-5 leading-7">
                        Lorem ipsum dolor, sit amet consectetur adipisicing
                        elit. Ipsa pariatur adipisci quaerat architecto, ab enim
                        sapiente dolores itaque vitae accusantium magnam quis
                        eum necessitatibus voluptatum corporis reiciendis,
                        exercitationem quo nisi! Lorem ipsum dolor, sit amet
                        consectetur adipisicing elit. Ipsa pariatur adipisci
                        quaerat architecto, ab enim sapiente dolores itaque
                        vitae accusantium magnam quis eum necessitatibus
                        voluptatum corporis reiciendis, exercitationem quo nisi!
                    </p>
                </div>
                <div className="w-full lg:w-5/12 ">
                    <div className=" relative mb-8 mr-8 before:absolute before:top-8  before:-bottom-8 before:left-8 before:-right-8 before:border-8 before:border-emerald-400 before:content-['']">
                        <img
                            className="relative w-full"
                            src="/img/event/img-1.jpg"
                            alt=""
                        />
                    </div>
                </div>
            </div>
        </div>
    );
};

export default AboutContent;
