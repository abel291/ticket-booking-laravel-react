import Button from "@/Components/Button";
import SelectQuantity from "@/Components/SelectQuantity";
import React from "react";

const ListFood = () => {
    return (
        <div>
            <div className="flex flex-wrap items-center gap-3">
                <FilterListButton active={true}>TODO</FilterListButton>
                <FilterListButton>Combos</FilterListButton>
                <FilterListButton>Pollo</FilterListButton>
                <FilterListButton>Palomitas</FilterListButton>
            </div>
            <div className="mt-8">
                <div className="grid grid-cols-1  gap-6 md:grid-cols-2">
                    <CardFood />
                    <CardFood />
                </div>
            </div>
        </div>
    );
};
const FilterListButton = ({ active = false, children }) => {
    return (
        <div
            className={
                " rounded-full border border-dark-blue-500 px-6 py-2  uppercase" +
                (active ? " bg-gradient-red" : " border border-dark-blue-400")
            }
        >
            {children}
        </div>
    );
};
const CardFood = ({ title, img, id, price }) => {
    return (
        <div className="overflow-hidden rounded-xl border border-dark-blue-700 bg-dark-blue-800">
            <div className="relative">
                <img
                    src="/img/checkout/food-1.jpg"
                    className="w-full object-cover"
                    alt=""
                />
                <div
                    style={{
                        clipPath:
                            "polygon(50% 0%, 100% 0, 100% 100%, 50% 75%, 0 100%, 0 0)",
                    }}
                    className=" absolute top-0 left-7 rounded-b-md bg-emerald-400 px-2 pb-6 pt-4 text-2xl font-semibold"
                >
                    $23
                </div>
            </div>
            <div className="p-7">
                <h5 className="font-medium">
                    Lorem ipsum dolor sit amet consectetur
                </h5>
                <div className="mt-6 border-t border-dashed border-dark-blue-500 pt-6">
                    <div className="flex flex-wrap items-center justify-between gap-3 lg:gap-0">
                        <div>
                            <SelectQuantity />
                        </div>
                        <Button>Agregar</Button>
                    </div>
                </div>
            </div>
        </div>
    );
};
//
//
//
export default ListFood;
