import { Link } from '@inertiajs/react'
import React from 'react'

const TableTitleImage = ({ title, subTitle, img = null, path = null }) => {
    return (
        <div className="flex gap-x-3 ">
            {img && (
                <div className=" flex items-center">
                    <img src={img} className="w-28 rounded " alt="img" />
                </div>
            )}
            <div>
                {path ? (
                    <Link href={path} className="text-blue-500 font-medium">
                        {title}
                    </Link>
                ) : (
                    <div className="font-medium">
                        {title}
                    </div>
                )}

                <div className="mt-0.5 text-gray-500 text-xs">
                    {subTitle}
                </div>
            </div>
        </div>
    )
}

export default TableTitleImage
