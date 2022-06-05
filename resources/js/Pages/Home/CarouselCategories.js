import Carousel from '@/Components/Carousel'
import { Link, usePage } from '@inertiajs/inertia-react'
import React from 'react'
import { SwiperSlide } from 'swiper/react'

const CarouselCategories = () => {
    const { categories } = usePage().props
    return (
        <Carousel breakpoints={{
            420: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 20,
            },
            1280: {
                slidesPerView: 6,
                spaceBetween: 20,
            },
        }}>
            {categories.map((item, key) => (
                <SwiperSlide key={key}>
                    <Link href={route('events', { categories: [item.slug] })}>
                        <div className='relative w-full'>
                            <img
                                src={item.img}
                                alt={item.slug}
                                className="w-40 h-40 rounded-full object-cover mx-auto transition duration-200 hover:scale-105"
                            />
                            <div className='mt-6 text-center'>
                                <h4 className='font-bold'>{item.name}</h4>
                            </div>
                        </div>
                    </Link>
                </SwiperSlide>
            ))}
        </Carousel >
    )
}

export default CarouselCategories