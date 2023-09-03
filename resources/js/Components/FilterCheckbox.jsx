
import React from "react";
import Card from "./Card";
import CardFilter from "@/Pages/Filters/CardFilter";

const FilterCheckbox = ({ title, name, itemValue = "value", itemTitle = "title", items, itemsChecked, setData }) => {


    const handleChange = (e) => {
        let target = e.target;
        let newItemsChecked = [...itemsChecked];

        if (target.checked) {
            newItemsChecked.push(target.value);
        } else {
            newItemsChecked = newItemsChecked.filter(
                (item) => item !== target.value
            );
        }
        setData(name, newItemsChecked);
    };

    return (
        <CardFilter title={title} className="">
            <div className="space-y-3">
                {items.map((item, key) => (
                    <div className="flex items-center" key={key}>
                        <input
                            checked={itemsChecked.includes(item[itemValue])}
                            type="checkbox"
                            className="  input-checkbox"
                            value={item[itemValue]}
                            name={name}
                            onChange={handleChange}
                        />
                        <label htmlFor="" className="ml-2 text-sm text-gray-600">
                            {item[itemTitle]}
                        </label>
                    </div>
                ))}
            </div>
        </CardFilter>
    );
};

export default FilterCheckbox;
