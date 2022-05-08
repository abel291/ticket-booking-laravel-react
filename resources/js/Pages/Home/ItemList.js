import ItemCard from "@/Components/ItemCard";
import Section from "@/Components/Section";
import { Link } from "@inertiajs/inertia-react";
import React from "react";

const ItemList = ({
    type = "movies",
    title = "Lista",
    linkText = "ver mas",
    items = [],
}) => {
    return (
        <Section>
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
            <div className="grid grid-cols-1 items-stretch gap-5 sm:grid-cols-3 md:grid-cols-4">
                {items.map((item, key) => (
                    <ItemCard key={key} item={item} />
                ))}
            </div>
        </Section>
    );
};

export default ItemList;
