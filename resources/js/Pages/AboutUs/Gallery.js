import FsLightbox from "fslightbox-react";
import React, { useState } from "react";

const Gallery = () => {
    const imgGallery = [
        "/img/about/party-1.jpg",
        "/img/about/party-2.jpg",
        "/img/about/party-3.jpg",
        "/img/about/party-4.jpg",
        "/img/about/party-5.jpg",
        "/img/about/party-6.jpg",
        "/img/about/party-7.jpg",
        "/img/about/party-8.jpg",
        "/img/about/party-9.jpg",
    ];
    const [lightboxController, setLightboxController] = useState({
        toggler: false,
        slide: 0,
    });

    function openLightboxOnSlide(number) {
        setLightboxController({
            toggler: !lightboxController.toggler,
            slide: number,
        });
    }

    return (
        <div className="bg-dark-blue-800">
            <div className="py-section container">
                <div className="mx-auto max-w-3xl text-center">
                    <p className="text-2xl uppercase text-emerald-400">
                        ECHA UN VISTAZO
                    </p>
                    <h2 className="mt-2">UNA ENTRADA PARA CADA AFICIONADO.</h2>
                    <p className="mt-5  text-white text-opacity-90">
                        World se compromete a hacer que la participación en el
                        evento sea una experiencia libre de acoso para todos,
                        independientemente del nivel de experiencia, género,
                        identidad y expresión de género.
                    </p>
                </div>

                <div className="mt-14">
                    <div className="grid grid-cols-4 gap-5">
                        {imgGallery.map((img, key) => (
                            <div
                                key={key}
                                onClick={() => openLightboxOnSlide(key+1)}
                                className={
                                    "cursor-pointer " +
                                    (key === 1 ? "col-span-2 row-span-2" : "")
                                }
                            >
                                <img
                                    className="h-full w-full rounded-md object-cover"
                                    src={img}
                                    alt=""
                                />
                            </div>
                        ))}
                    </div>
                </div>
            </div>
            <FsLightbox
                toggler={lightboxController.toggler}
                sources={imgGallery}
                slide={lightboxController.slide}
            />
        </div>
    );
};

export default Gallery;
