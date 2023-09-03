import React from 'react'

const CardSpeaker = ({ img, name, position }) => {
    return (
        <div>
            <img
                src={img}
                alt=""
                className=" aspect-square w-full rounded-lg object-cover"
            />
            <div className="mt-7 text-center">
                <h5 className="font-semibold">{name}</h5>
                <p className="mt-4 uppercase text-primary-400">
                    {position}
                </p>
            </div>
        </div>
    )
}

export default CardSpeaker
