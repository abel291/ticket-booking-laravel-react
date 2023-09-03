import React, { useState, useEffect } from "react";
import Select from "@/Components/Select";

import { usePage } from "@inertiajs/react";
import Button from "@/Components/Button";
import Input from "@/Components/Input";
const FilterOrder = ({ data, setData }) => {

    const [search, setSearch] = useState(data.search);
    const handleChange = (e) => {
        let target = e.target;
        setData(target.name, target.value);
    };
    const handleSubmit = (e) => {
        e.preventDefault();

        setData('search', search);
    };

    return (
        <div className="rounded-lg  pb-3 px-7 ">
            <div className="flex flex-wrap items-start justify-between gap-6">
                <div className="flex items-center gap-2 text-sm">
                    <span>Mostrar:</span>
                    <Select
                        name="perPage"
                        className="text-sm"
                        handleChange={handleChange}
                        value={data.perPage}
                    >
                        <option value="12">12</option>
                        <option value="24">24</option>
                        <option value="32">32</option>
                    </Select>
                </div>
                <form
                    onSubmit={handleSubmit}
                    className="flex items-center gap-4 text-sm"
                >
                    <Input
                        type="text"
                        value={search}
                        className="input w-full text-sm"
                        placeholder="Busca tu evento"
                        name="search"
                        onChange={(e) => { setSearch(e.target.value); }}
                    />
                    <Button>Buscar</Button>
                </form>
            </div>
        </div>
    );
};

export default FilterOrder;
