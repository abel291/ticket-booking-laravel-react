
import React, { useState } from "react";
import FsLightbox from "fslightbox-react";
const EventGallery = ({ images }) => {

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
        <div className="relative ">
            <div className="grid grid-cols-2 lg:grid-cols-5 gap-6">
                {images.map((item, key) => (
                    <div key={key}
                        onClick={() => openLightboxOnSlide(key + 1)}
                        className="cursor-pointer overflow-hidden ">
                        <img
                            src={item.img}
                            alt={item.alt}
                            title={item.title}
                            className="w-full rounded-md object-cover object-center transition duration-200 hover:scale-10 aspect-square"
                        />
                    </div>
                ))}

                <FsLightbox
                    toggler={lightboxController.toggler}
                    sources={images.map(item => item.img)}
                    slide={lightboxController.slide}
                />
            </div>
        </div >
    );
};

export default EventGallery;
