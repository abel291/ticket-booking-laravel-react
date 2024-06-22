import Button from "@/Components/Button";
import FormGrid from "@/Components/Form/FormGrid";
import InputLabelError from "@/Components/Form/InputLabelError";
import TextAreaLabelError from "@/Components/Form/TextAreaLabelError";
import TitleSection from "@/Components/TitleSection";
import { PaperAirplaneIcon } from "@heroicons/react/24/solid";
import { useForm } from "@inertiajs/react";
import React from "react";

const FormContact = ({ form }) => {
    const { setData, data, post, processing, errors } = useForm({
        // name: "Tomas myke",
        // phone: "+57-12312312",
        // email: "user@user.com",
        // subject: "Asusnto del mensaje",
        // message: "informacion a consultar",
        name: "",
        phone: "",
        email: "",
        subject: "",
        message: "",
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        post(route("contact_us.save"));
    };
    const handleChange = (e) => {
        e.preventDefault();
        let target = e.target;
        setData(target.name, target.value);
    };
    return (
        <div className="mx-auto max-w-3xl">
            <TitleSection
                className="text-center"
                title="Enviar mensaje"
                subTitle="¿TIENE PREGUNTAS?"
            />
            <form onSubmit={handleSubmit}>
                <FormGrid>
                    <div className="sm:col-span-3">
                        <InputLabelError
                            handleChange={handleChange}
                            errors={errors.title}
                            label="Nombre"
                            name="name"
                            value={data.name}
                            placeholder="Tomas"
                        />
                    </div>
                    <div className="sm:col-span-3">
                        <InputLabelError
                            handleChange={handleChange}
                            errors={errors.slug}
                            label="Telefono"
                            name="phone"
                            value={data.phone}
                            placeholder="+57-12312312"
                        />
                    </div>
                    <div className="sm:col-span-3">
                        <InputLabelError
                            type="email"
                            handleChange={handleChange}
                            errors={errors.slug}
                            label="Email"
                            name="email"
                            value={data.email}
                            placeholder="user@user.com"
                        />
                    </div>
                    <div className="sm:col-span-3">
                        <InputLabelError
                            handleChange={handleChange}
                            errors={errors.slug}
                            label="Asunto"
                            name="subject"
                            value={data.subject}
                            placeholder="Asunto del mensaje"
                        />
                    </div>
                    <div className="sm:col-span-6">
                        <TextAreaLabelError
                            rows="6"
                            handleChange={handleChange}
                            errors={errors.slug}
                            label="Mensaje"
                            name="message"
                            value={data.message}
                            placeholder="Informacion a consultar"
                        />
                    </div>
                    <div className="sm:col-span-6 text-center">
                        <Button
                            Icon={PaperAirplaneIcon}
                            processing={processing}
                        >
                            Enviar mensaje
                        </Button>
                    </div>
                </FormGrid>
            </form>
        </div>
    );
};

export default FormContact;
