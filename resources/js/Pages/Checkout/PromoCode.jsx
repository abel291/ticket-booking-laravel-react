import React from "react";
import Card from "@/Components/Card";
import Button from "@/Components/Button";
import Input from "@/Components/Input";
import { useForm, usePage } from "@inertiajs/react";
import { useState, useRef, useEffect } from "react";
const PromoCode = ({ data, setData }) => {
    const promotions = usePage().props.promotions || [];
    const codRef = useRef();

    const handleSubmit = (e) => {
        e.preventDefault();
        setData({ ...data, code_promotion: codRef.current.value })
        codRef.current.value = "";
    }
    return (
        <Card title="Codigo de Promocion">

            <form onSubmit={handleSubmit} className="mb-3">
                <div className="mt-7 flex items-center gap-3">
                    <input
                        ref={codRef}
                        defaultValue=""
                        className="input-form w-full uppercase grow"
                        required={true}
                        name="code"
                        placeholder="Codigo *"
                    />

                    <div>
                        <Button>
                            Verificar
                        </Button>
                    </div>
                </div>
                <div className="flex gap-x-2 mt-1.5">
                    {promotions.map((item) => (
                        <div key={item.id} className=" inline-block text-xs text-gray-400">{item.code}</div>
                    ))}
                </div>
            </form>

        </Card>
    );
};

export default PromoCode;
