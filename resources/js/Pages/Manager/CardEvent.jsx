import React from 'react'

const CardEvent = ({ title = null, img = null, category, subCategory }) => {
    return (
        <div>
            {title && (
                <div className="px-4 sm:px-0">
                    <h3 className="text-base font-semibold leading-7 text-gray-900">Infomracion del evento</h3>
                </div>
            )}
            <div className="mt-2  flex items-center gap-x-4">
                {img && (
                    <div>
                        <img src={img} className="h-20 object-cover rounded-md" alt="img card" />
                    </div>
                )}
                <dl className=" text-gray-900">
                    <div className="px-2 py-1 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt className="text-sm font-medium  ">Nombre</dt>
                        <dd className="text-sm  text-gray-700 sm:col-span-2">{title}</dd>
                    </div>
                    <div className="px-2 py-1 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt className="text-sm font-medium  ">Categoria</dt>
                        <dd className="text-sm  text-gray-700 sm:col-span-2">{category}</dd>
                    </div>
                    <div className="px-2 py-1 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt className="text-sm font-medium  ">Sub categoria</dt>
                        <dd className="text-sm  text-gray-700 sm:col-span-2">{subCategory}</dd>
                    </div>


                </dl>
            </div>
        </div>
    )
}

export default CardEvent
