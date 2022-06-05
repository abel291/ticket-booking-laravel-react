import Carousel from '@/Components/Carousel'
import { Link } from '@inertiajs/inertia-react'
import React from 'react'
import { SwiperSlide } from 'swiper/react'

const CarouselHome = ({ eventsCarousel }) => {
    return (
        <Carousel>
            {eventsCarousel.map((item, key) => (
                <SwiperSlide key={key}>
                    <div className='relative w-full'>
                        <img
                            src={item.banner}
                            alt=""
                            className="w-full rounded-lg object-cover"
                        />
                        <div className='absolute bottom-2 left-2 md:bottom-8 md:left-8 md:w-1/2 '>
                            <h4 className='hidden md:block font-bold'>{item.title}</h4>
                            <Link href={route('event', { slug: item.slug })} className="mt-3 
                            px-4 py-1.5 bg-emerald-500 inline-block font-bold text-sm md:textl-lg rounded">Comprar Entrda</Link>
                        </div>

                    </div>
                </SwiperSlide>
            ))}
        </Carousel>
    )
}

export default CarouselHome