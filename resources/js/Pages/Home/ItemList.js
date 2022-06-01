import ItemCard from "@/Components/ItemCard";
import Section from "@/Components/Section";
import { Link } from "@inertiajs/inertia-react";
import React from "react";

const ItemList = ({
    title = "Lista",
    linkText = "Ver mas",
    linkPath = route("events"),
    events = [],
}) => {
    return (
        <div className="py-section">

            <div className=" mb-8 flex items-center justify-between border-b border-dark-blue-400  pb-3">
                <h2 className="text-2xl font-bold uppercase md:text-4xl">
                    {title}
                </h2>
                <Link
                    className="text-sm font-medium text-emerald-400 md:text-base"
                    href={linkPath}
                >
                    {linkText}
                </Link>
            </div>

            <div className="grid grid-cols-1 items-stretch gap-8 sm:grid-cols-3 md:grid-cols-4">
                {events.map((item, key) => (
                    <ItemCard key={key} event={item} />
                ))}
            </div>
        </div>
    );
};

export default ItemList;
