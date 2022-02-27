import React from "react";
import { WidgetCheck } from "./Products";

const Categories = () => {
    return (
        <WidgetCheck title="Categorias">
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
        </WidgetCheck>
    );
};

export default Categories;
