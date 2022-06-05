
import React, { useState } from "react";
import FsLightbox from "fslightbox-react";
import Masonry, { ResponsiveMasonry } from "react-responsive-masonry"
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
            <div className="">
                <ResponsiveMasonry
                    columnsCountBreakPoints={{ 350: 1, 750: 2, 900: 4 }}
                >
                    <Masonry gutter="20px">
                        {images.map((item, key) => (
                            <div key={key}
                                onClick={() => openLightboxOnSlide(key + 1)}
                                className="cursor-pointer overflow-hidden">
                                <img
                                    src={item.img}
                                    alt={item.alt}
                                    title={item.title}
                                    className="w-full  rounded-md object-cover transition duration-200 hover:scale-105"
                                />
                            </div>
                        ))}
                    </Masonry>
                </ResponsiveMasonry>

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
