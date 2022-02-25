import ItemCard from "@/Components/ItemCard";
import { Link } from "@inertiajs/inertia-react";
import React from "react";

const ItemList = ({
    type = "movies",
    title = "Lista",
    linkText = "ver mas",
    items = [],
}) => {
    return (
        <div className="container py-20 lg:py-24 xl:py-32">
            <div>
                <div className="mb-8 flex items-center justify-between border-b border-white border-opacity-30 pb-3">
                    <h2 className="text-2xl font-bold uppercase md:text-4xl">
                        {title}
                    </h2>
                    <Link
                        className="text-sm font-medium text-emerald-400 md:text-base"
                        href={route("home")}
                    >
                        {linkText}
                    </Link>
                </div>
            </div>
            <div className="grid grid-cols-1 gap-5 sm:grid-cols-2 md:grid-cols-3">
                {items.map((item, key) => (
                    <div key={key}>
                        <ItemCard item={item} />
                    </div>
                ))}
            </div>
        </div>
    );
};

export default ItemList;
