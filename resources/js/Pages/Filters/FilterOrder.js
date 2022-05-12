import React, { useState, useEffect } from "react";
import Select from "@/Components/Select";
import useFilters from "@/Hooks/useFilters";
import { usePage } from "@inertiajs/inertia-react";
import Button from "@/Components/Button";
import Input from "@/Components/Input";
const FilterOrder = () => {
    const { filters } = usePage().props;
    const { sendForm } = useFilters();
    const [search, setSearch] = useState("");

    const filterPerPage = filters?.perPage || 12;

    const handleChange = (e) => {
        let target = e.target;
        sendForm({ [target.name]: target.value });
    };
    const handleSubmit = (e) => {
        e.preventDefault();

        sendForm({
            search: search,
        });
    };

    useEffect(() => {
        setSearch(filters?.search || "");
    }, []);

    return (
        <div className="rounded-lg border border-dark-blue-400 py-3 px-7 ">
            <div className="flex flex-wrap items-start justify-between gap-6">
                <div className="flex items-center gap-2 text-sm">
                    <span>Mostrar:</span>
                    <Select
                        name="perPage"
                        className="text-sm"
                        handleChange={handleChange}
                        value={filterPerPage}
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
                    <input
                        type="text"
                        value={search}
                        className="input w-full text-sm"
                        placeholder="Busca tu evento"
                        name="search"
                        onChange={(e) => {
                            console.log(search);
                            setSearch(e.target.value);
                        }}
                    />
                    <Button>Buscar</Button>
                </form>
            </div>
        </div>
    );
};

export default FilterOrder;
