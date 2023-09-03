import ItemCard from '@/Components/ItemCard'
const EventList = ({ events, processing }) => {

    return (
        <div className='grid grid-cols-3 gap-6'>
            {events.map((item, key) => (
                <ItemCard key={key} event={item} />
            ))}
        </div>

    )
}

export default EventList
