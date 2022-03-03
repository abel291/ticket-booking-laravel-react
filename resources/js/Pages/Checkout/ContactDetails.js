import Card from "@/Components/Card";
import Input from "@/Components/Input";
import React from "react";

const ContactDetails = ({ data, setData }) => {
    const onHandleChange = (e) => {
        let target = e.target;
        setData(target.name, target.value);
    };
    return (
        <Card title="Comparta sus Datos de Contacto">
            <div className=" border-t border-dashed border-dark-blue-400">
                <div className="mt-7 grid grid-cols-2 gap-4">
                    <div>
                        <Input
                            handleChange={onHandleChange}
                            className="w-full"
                            required={true}
                            name="name"
                            value={data.name}
                            placeholder="Nombre y Apelido *"
                        />
                    </div>
                    <div>
                        <Input
                            handleChange={onHandleChange}
                            className="w-full"
                            required={true}
                            name="email"
                            type="email"
                            value={data.email}
                            placeholder="Correo electronico *"
                        />
                    </div>
                    <div>
                        <Input
                            handleChange={onHandleChange}
                            className="w-full"
                            required={true}
                            name="phone"
                            value={data.phone}
                            placeholder="Telefono *"
                        />
                    </div>
                </div>
            </div>
        </Card>
    );
};

export default ContactDetails;
