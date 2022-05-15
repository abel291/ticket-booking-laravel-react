import React from "react";

const ItemsLoading = () => {
    return (
        <div className="mt-7 grid grid-cols-1 gap-5 sm:grid-cols-2 md:grid-cols-3">
            {[1, 2, 3, 4, 5, 6].map((key) => (
                <div
                    key={key}
                    className="flex h-full animate-pulse flex-col overflow-hidden rounded  bg-dark-blue-800"
                >
                    <div className="h-48  w-full  overflow-hidden bg-dark-blue-700"></div>
                    <div className="flex grow flex-col p-5  ">
                        <div className="overflow-hidden  pb-3">
                            <div className="h-4 w-4/5  rounded-lg bg-dark-blue-700"></div>
                        </div>

                        <div className="grow border-t border-dashed  border-dark-blue-500 pt-2">
                            <div className="flex justify-between gap-x-4 ">
                                <div className="h-4 w-full  rounded-lg bg-dark-blue-700"></div>
                                <div className="h-4 w-full  rounded-lg bg-dark-blue-700"></div>
                            </div>
                            <div className="mt-3 h-4 w-full  rounded-lg bg-dark-blue-700"></div>
                        </div>
                    </div>
                </div>
            ))}
        </div>
    );
};

export default ItemsLoading;
