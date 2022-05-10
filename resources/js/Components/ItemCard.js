import { Link } from "@inertiajs/inertia-react";
import React from "react";
import { FaSplotch } from "react-icons/fa";
const ItemCard = ({ item }) => {
    
    return (
        <Link href={route("event", { slug: item.slug })}>
            <div className="flex h-full flex-col overflow-hidden rounded bg-dark-blue-700">
                <div className=" overflow-hidden">
                    <img
                        src={item.card}
                        alt="movie"
                        className="w-full transition hover:scale-105"
                    />
                </div>
                <div className="flex grow flex-col p-5 ">
                    <div className="grow overflow-hidden  pb-2">
                        <h5 className=" text-xl font-medium uppercase line-clamp-none lg:line-clamp-2 ">
                            {item.name}
                        </h5>
                        
                    </div>

                    <div className=" border-t border-dashed border-dark-blue-400 pt-2 ">
                        <div className="flex justify-between ">
                            <div className="inline-block text-xs font-medium text-emerald-400">
                                {item.session.date} {item.session.time}
                            </div>
                            <div className="inline-block text-xs font-medium text-emerald-400">
                                {item.duration}
                            </div>
                        </div>
                        <div className=" mt-3 text-xs line-clamp-none lg:line-clamp-2">
                            {item.type == "movie" ? (
                                <div className="flex items-center gap-4 text-base">
                                    <div
                                        className="flex items-center gap-1"
                                        title="tomatoes"
                                    >
                                        <img
                                            src="img/tomatoes.svg"
                                            className="h-4 w-4"
                                        />
                                        <span>{item.tomatoes}%</span>
                                    </div>
                                    <div
                                        className="flex items-center gap-1"
                                        title="Calificaion"
                                    >
                                        <FaSplotch className="h-4 w-4 text-yellow-500" />
                                        <span>{item.score}%</span>
                                    </div>
                                </div>
                            ) : (
                                <span>{item.location.address}</span>
                            )}
                        </div>
                    </div>
                </div>
            </div>
        </Link>
    );
};

export default ItemCard;
