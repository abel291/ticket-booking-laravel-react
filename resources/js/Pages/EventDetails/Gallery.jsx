import FsLightbox from "fslightbox-react";
import React, { useState } from "react";

const Gallery = () => {
    const imgGallery = [
        "/img/event/gallery-1.jpg",
        "/img/event/gallery-2.jpg",
        "/img/event/gallery-3.jpg",
        "/img/event/gallery-4.jpg",
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
        <div className="py-section">
            <div className="grid grid-cols-1 lg:grid-flow-col lg:grid-cols-3">
                <div
                    className="overflow-hidden lg:row-span-2"
                    onClick={() => openLightboxOnSlide(1)}
                >
                    <img
                        className="h-full w-full cursor-pointer object-cover transition duration-200 hover:scale-110"
                        src={imgGallery[0]}
                        alt=""
                    />
                </div>
                <div
                    className="overflow-hidden"
                    onClick={() => openLightboxOnSlide(2)}
                >
                    <img
                        className="h-full w-full cursor-pointer object-cover transition duration-200 hover:scale-110"
                        src={imgGallery[1]}
                        alt=""
                    />
                </div>
                <div
                    className="overflow-hidden"
                    onClick={() => openLightboxOnSlide(3)}
                >
                    <img
                        className="h-full w-full cursor-pointer object-cover transition duration-200 hover:scale-110"
                        src={imgGallery[2]}
                        alt=""
                    />
                </div>
                <div
                    className="overflow-hidden lg:row-span-2"
                    onClick={() => openLightboxOnSlide(4)}
                >
                    <img
                        className="h-full w-full cursor-pointer object-cover transition duration-200 hover:scale-110"
                        src={imgGallery[3]}
                        alt=""
                    />
                </div>
                <FsLightbox
                    toggler={lightboxController.toggler}
                    sources={imgGallery}
                    slide={lightboxController.slide}
                />
            </div>
        </div>
    );
};

export default Gallery;
