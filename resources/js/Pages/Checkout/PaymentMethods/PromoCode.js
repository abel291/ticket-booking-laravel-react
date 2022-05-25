import React from "react";
import Card from "@/Components/Card";
import Button from "@/Components/Button";
import Input from "@/Components/Input";
import { useForm } from "@inertiajs/inertia-react";
import { useState, useRef, useEffect } from "react";
const PromoCode = ({ data, setData }) => {

    const codRef = useRef();

    useEffect(() => {
        codRef.current.value = data.code_promotion;
    }, []);

    const handleSubmit = (e) => {
        e.preventDefault();
        if (data.code_promotion == codRef.current.value) return
        setData({ ...data, code_promotion: codRef.current.value })
    }
    return (
        <Card title="Codigo de Promocion">

            <form onSubmit={handleSubmit} className="mb-3">
                <div className="mt-7 grid grid-cols-2 gap-4">
                    <input
                        ref={codRef}
                        className="input w-full"
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
            </form>

        </Card>
    );
};

export default PromoCode;
