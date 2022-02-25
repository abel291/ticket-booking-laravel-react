import { Link } from "@inertiajs/inertia-react";
import React from "react";

const ItemCard = ({ item }) => {
    return (
        <Link href={route("home", { slug: "" })}>
            <div className="overflow-hidden rounded bg-dark-blue-500 w-">
                <div className=" overflow-hidden">
                    <img
                        src={"/img/events/img-" + item + ".jpg"}
                        alt="movie"
                        className="transition hover:scale-105 w-full"
                    />
                </div>
                <div className="p-5">
                    <h5 className="pb-2 text-xl font-medium uppercase line-clamp-none lg:line-clamp-2">
                        loremsit amet consectetur
                    </h5>

                    <div className=" border-t border-dashed border-dark-blue-400 pt-2 ">
                        <div className="flex justify-between ">
                            <div className="inline-block text-xs font-medium text-emerald-400">
                                06 Dec, 2020
                            </div>
                            <div className="inline-block text-xs font-medium text-emerald-400">
                                2 hrs 50 mins
                            </div>
                        </div>
                        <p className=" mt-3 text-xs line-clamp-none lg:line-clamp-2">
                            96593 White View Apt. 094 Jonesberg, FL 05565
                        </p>
                    </div>
                </div>
            </div>
        </Link>
    );
};

export default ItemCard;
