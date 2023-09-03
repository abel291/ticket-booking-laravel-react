import React from 'react'

const Hero = ({ children, className, img = null }) => {
    return (
        <div className={"relative mx-auto " + (img ? "bg-black text-white" : "bg-gradient-red text-white")}>
            <div className='relative z-10 container pb-14 pt-24  md:pb-24 md:pt-28 lg:pb-28 lg:pt-48'>
                {children}
            </div>
            {img && (
                <div
                    style={{ backgroundImage: "url(" + img + ")" }}
                    className="absolute inset-0 bg-cover bg-center bg-no-repeat opacity-70">
                </div>
            )}
        </div >
    )
}

export default Hero
