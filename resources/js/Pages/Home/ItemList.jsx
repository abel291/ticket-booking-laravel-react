import ItemCard from "@/Components/ItemCard";
import Section from "@/Components/Section";
import { ChevronRightIcon } from "@heroicons/react/24/solid";
import { Link } from "@inertiajs/react";

import React from "react";

const ItemList = ({
    title = "Lista",
    subTitle = null,
    linkText = "Ver más",
    linkPath = false,
    children,
}) => {
    return (
        <div className="py-section">

            <div className=" mb-8 flex items-end justify-between pb-3 border-b">
                <div>
                    {subTitle && (<span className="inline-block text-primary-500 mb-3 font-semibold">{subTitle}</span>)}
                    <h2 className="text-2xl font-bold uppercase md:text-4xl">
                        {title}
                    </h2>
                </div>
                {linkPath && (
                    <Link
                        className="text-sm font-medium text-primary-500 md:text-sm flex items-center"
                        href={linkPath}
                    >
                        {linkText}

                    </Link>
                )}

            </div>
            {children}


        </div>
    );
};
const Grid = ({ events }) => {
    return (
        <div className="grid grid-cols-1 items-stretch gap-6 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4">
            {events.map((item, key) => (
                <ItemCard key={key} event={item} />
            ))}
        </div>
    )
}
ItemList.Grid = Grid;

export default ItemList;
