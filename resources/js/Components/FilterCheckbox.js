
import React from "react";
import Card from "./Card";

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
        <Card title={title} className="bg-dark-blue-800">
            <div className="space-y-3">
                {items.map((item, key) => (
                    <div className="flex items-center" key={key}>
                        <input
                            checked={itemsChecked.includes(item[itemValue])}
                            type="checkbox"
                            className="border border-dark-blue-400 rounded bg-transparent"
                            value={item[itemValue]}
                            name={name}
                            onChange={handleChange}
                        />
                        <label htmlFor="" className="ml-2 text-sm">
                            {item[itemTitle]}
                        </label>
                    </div>
                ))}
            </div>
        </Card>
    );
};

export default FilterCheckbox;
