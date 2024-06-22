import ItemCard from "@/Components/ItemCard";
import Section from "@/Components/Section";
import { ArrowLongRightIcon } from "@heroicons/react/24/outline";
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
            <div className=" mb-8 flex items-end justify-between pb-3 border-b border-white/10">
                <div>
                    {subTitle && (
                        <span className="inline-block mb-1.5 font-medium text-primary-500">
                            {subTitle}
                        </span>
                    )}
                    <h2 className="text-2xl font-bold uppercase md:text-3xl">
                        {title}
                    </h2>
                </div>
                {linkPath && (
                    <Link
                        className="font-medium text-sm text-primary-500  flex items-end"
                        href={linkPath}
                    >
                        {linkText}
                        <ArrowLongRightIcon className="w-4 h-4 ml-2" />
                    </Link>
                )}
            </div>
            {children}
        </div>
    );
};
const Grid = ({ events }) => {
    return (
        <div className="grid grid-cols-1 items-stretch gap-5 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            {events.map((item, key) => (
                <ItemCard key={key} event={item} />
            ))}
        </div>
    );
};
ItemList.Grid = Grid;

export default ItemList;
