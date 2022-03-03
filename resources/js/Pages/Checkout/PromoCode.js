import React from "react";
import Card from "@/Components/Card";
import Button from "@/Components/Button";
import Input from "@/Components/Input";
import { useForm } from "@inertiajs/inertia-react";
const PromoCode = () => {
    const applyDiscount = useForm({ code: "" });
    const handleSubmitDiscount = (e) => {
        e.preventDefault();
        if (applyDiscount.data.code === "") {
            return;
        }

        applyDiscount.get(route("home"), {
            preserveScroll: true,
        });
    };

    return (
        <Card title="Codigo de Promocion">
            <div className=" border-t border-dashed border-dark-blue-400">
                <form onSubmit={handleSubmitDiscount} className="mb-3">
                    <div className="mt-7 grid grid-cols-2 gap-4">
                        <Input
                            handleChange={(e) =>
                                applyDiscount.setData("code", e.target.value)
                            }
                            className="w-full"
                            required={true}
                            name="Code"
                            placeholder="Codigo *"
                        />
                        <div>
                            <Button processing={applyDiscount.processing}>
                                Verificar
                            </Button>
                        </div>
                    </div>
                </form>
            </div>
        </Card>
    );
};

export default PromoCode;
