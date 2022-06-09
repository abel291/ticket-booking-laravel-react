import ItemCard from '@/Components/ItemCard'
import ItemsLoading from '@/Components/ItemsLoading'
import Pagination from '@/Components/Pagination'
import React from 'react'
import { motion } from 'framer-motion'
const EventList = ({ events, processing }) => {

    const container = {
        hidden: { opacity: 0 },
        show: {
            opacity: 1,
            transition: {
                staggerChildren: 0.05
            }
        }
    }

    const transitionChildren = {
        hidden: { opacity: 0, scale: 0.95 },
        show: { opacity: 1, scale: 1 }
    }
    return (

        <motion.div
            variants={container}
            initial="hidden"
            animate="show"
            className='mt-7 grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-3'
        >
            {events.map((item, key) => (
                <motion.div key={key} variants={transitionChildren}>
                    <ItemCard event={item} />
                </motion.div>
            ))}
        </motion.div>

    )
}

export default EventList