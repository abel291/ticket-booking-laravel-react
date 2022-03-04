import React from "react";
import Card from "./Card";

const Categories = () => {
    return (
        <Card title="Categorias">
            <div className="space-y-3">
                {[1, 2, 3, 4, 5, 6].map((item, key) => (
                    <div className="flex items-center gap-2" key={key}>
                        <input
                            type="checkbox"
                            className="border border-white bg-transparent"
                        />
                        <label htmlFor="" className="text-sm font-light">
                            {item} ACTION
                        </label>
                    </div>
                ))}
            </div>
        </Card>
    );
};

export default Categories;
