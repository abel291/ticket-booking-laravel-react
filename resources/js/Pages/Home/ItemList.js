import ItemCard from "@/Components/ItemCard";
import Section from "@/Components/Section";
import { Link } from "@inertiajs/inertia-react";
import React from "react";

const ItemList = ({
    title = "Lista",
    linkText = "Ver mas",
    linkPath = false,
    children,
}) => {
    return (
        <div className="py-section">

            <div className=" mb-8 flex items-center justify-between border-b border-dark-blue-400  pb-3">
                <h2 className="text-2xl font-bold uppercase md:text-4xl">
                    {title}
                </h2>
                {linkPath && (
                    <Link
                        className="text-sm font-medium text-emerald-400 md:text-base"
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
