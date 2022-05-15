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
        <div className="py-section container">
            <div className="mx-auto max-w-3xl text-center">
                <p className="sub-title">ECHA UN VISTAZO</p>
                <h2 className="mt-4 font-bold">UNA ENTRADA PARA CADA AFICIONADO.</h2>
                <p className="text mt-4">
                    World se compromete a hacer que la participación en el
                    evento sea una experiencia libre de acoso para todos,
                    independientemente del nivel de experiencia, género,
                    identidad y expresión de género.
                </p>
            </div>

            <div className="mt-14">
                <div className="grid grid-cols-1 gap-5 sm:grid-cols-2 md:grid-cols-4">
                    {imgGallery.map((img, key) => (
                        <div
                            key={key}
                            onClick={() => openLightboxOnSlide(key + 1)}
                            className={
                                "cursor-pointer overflow-hidden " +
                                (key === 1 ? "md:col-span-2 md:row-span-2" : "")
                            }
                        >
                            <img
                                className="h-full w-full rounded-md object-cover transition duration-200 hover:scale-110"
                                src={img}
                                alt=""
                            />
                        </div>
                    ))}
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
